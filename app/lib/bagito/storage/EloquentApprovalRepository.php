<?php namespace Bagito\Storage;

use Approval;
use Quotation;
use UserLoad;
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