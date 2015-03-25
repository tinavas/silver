<?php namespace Bagito\Storage;

use Approval;
use Quotation;
use UserLoad;
use User;
use UserGroup;
use Notification;
class EloquentApprovalRepository implements ApprovalRepository
{
	public function approve($userId, $quotationId)
	{
		$a = new Approval();
		$a->user_id = $userId;
		$a->quotation_id = $quotationId;
		$a->approval_status = 1;
		$a->save(); 

		/*CHECKING FOR STATUS*/
		$quotation = Quotation::find($quotationId);
		$project = $quotation->project()->first();

		$total = floor(count(UserLoad::where('project_id',$project->id)->get()) / 2);
		$currentApprovals = count(Approval::where('quotation_id',$quotationId)->where('approval_status',1)->get());
	
		if($currentApprovals >= $total){
			$quotation->status = 1;
			$quotation->save();

			//Sending Notification:
			$results =  UserGroup::where('group_id' , '=' , 1)->get();
			$ids = array();
			foreach($results as $result){
				array_push($ids,$result->user_id);
			}

			if(count($ids) != 0){
				$users = User::whereIn('id', $ids)->get();
			}
			else{
				$users = null;
			}

			foreach($users as $user){
				$notif = new Notification();
				$notif->user_id = $user->id;
				$notif->description = 'New quotation for client approval. Title: ' . $quotation->title . ' on project: ' . $project->title; 
				$notif->is_read = 0;
				$notif->save();
			}

		}
	}
	public function disapprove($userId, $quotationId)
	{
		$a = new Approval();
		$a->user_id = $userId;
		$a->quotation_id = $quotationId;
		$a->approval_status = 0;
		$a->save(); 	
	}
}