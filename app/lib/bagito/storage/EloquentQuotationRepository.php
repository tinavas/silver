<?php namespace Bagito\Storage;

use Quotation;
use Project;
use UserLoad;
use Approval;
use OtherExpense;
use QuotationLoad;
use Entry;

class EloquentQuotationRepository implements QuotationRepository
{

	public function create($userId,$projectId,$inputs)
	{
		$quotation = new Quotation;
		$quotation->project_id = $projectId;
		$quotation->user_id = $userId;
		$quotation->remarks = $inputs['remarks'];
		$quotation->title = $inputs['title'];
		$quotation->cont = $inputs['cont'];
		$quotation->others = $inputs['others'];
		$quotation->tax = $inputs['tax'];
		$quotation->quotation_code = $this->nextQuotationCode($userId, $projectId);
		$quotation->status = 0;
		$quotation->save();

		return $quotation;

	}

	public function update($id, $inputs)
	{
		$quotation = Quotation::find($id);
		$quotation->remarks = $inputs['remarks'];
		$quotation->title = $inputs['title'];
		$quotation->cont = $inputs['cont'];
		$quotation->others = $inputs['others'];
		$quotation->tax = $inputs['tax'];
		$quotation->save();

		return $quotation;
	}

	public function delete($id)
	{
		$quotation = Quotation::find($id);
		$quotation ->delete();

	}

	public function changeStatus($id, $status)
	{
		$quotation = Quotation::find($id);
		$quotation->status = $status;
		$quotation->save();
		return $quotation;
	}

	public function getAllApproved()
	{
		$quotations = Quotation::where('status',2)->get();
		return $quotations;
	}

	public function getRejected()
	{
		$quotations = Quotation::where('status',-1)->get();
		return $quotations;	
	}

	public function getAllOngoing()
	{
		$quotations = Quotation::where('status',0)->get();
		return $quotations;
	}

	public function find($id)
	{
		$quotation = Quotation::find($id);
		return $quotation;
	}

	public function getAllActive()
	{
		$quotations = Quotation::where('status',1)->get();
		return $quotations;
	}

	public function getAllQuotation($projectId)
	{
		return Project::find($projectId)->quotation()->get();
	}

	public function getAllEntries($id)
	{
		return Quotation::find($id)->entries()->get();
	}

	private function nextQuotationCode($userId,$projectId)
	{
		return Quotation::where('project_id',$projectId)->count() + 1;
	}

	public function getActive($projectId)
	{
		return Project::find($projectId)->quotations()->where('status','1')->get();
	}

	public function getAllQuotationByUser($userId)
	{
		return Quotation::where('user_id',$userId)->where('for_approval',0)->get();
	}

	public function tagAsForApproval($id)
	{
		$quotation = Quotation::find($id);
		$quotation->for_approval = 1;
		$quotation->save();
	}

	public function verifyQuotation($userId, $quotationId)
	{
		$result = Quotation::where('user_id',$userId)->where('id',$quotationId);
		if(count($result) != 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getOtherQuotation($id)
	{
		$some = array();
		$hahaha = array();
		$load = UserLoad::where('user_id',$id)->get();
		$approved = Approval::distinct()->select('quotation_id')->where('user_id',$id)->groupBy('quotation_id')->get();
		foreach($load as $l)
		{
			$some[] = $l->project_id;
		}

		foreach($approved as $a)
		{
			$hahaha[] = $a->quotation_id;
		}
		if(count($some) != 0)
		{
			if(count($approved) != 0){

				return Quotation::where('user_id', '!=' , $id)
								->where('for_approval', 1)
								->where('status',0)
								->whereIn('project_id',$some)
								->whereNotIn('id',$hahaha)
								->get();
			}else{
				return Quotation::where('user_id', '!=' , $id)
								->where('for_approval', 1)
								->where('status',0)
								->whereIn('project_id',$some)->get();
			}
		}
		else
		{
			return null;
		}
	}

	public function addExpenses($id, $inputs){
		$expense = new OtherExpense();
		$expense->quotation_id = $id;
		$expense->description = $inputs['description'];
		$expense->cost = $inputs['cost'];

		$expense->save();
	}

	public function getExpensesById($id){
		return OtherExpense::where('quotation_id',$id)->get();
	}

	public function removeExpenses($id){
		$expense = OtherExpense::find($id);
		$expense->delete();
	}

	public function updateAdjustment($id,$amount){
		$quotation = Quotation::find($id);
		$quotation->adjustments = $amount;
		$quotation->save();
	}

	public function allQuotationLoad(){
		return QuotationLoad::all();
	}

	public function getAllEntryByQuotationId($id){
		return Entry::where('quotation_id',$id)->where('level',3)->get();
	}
}