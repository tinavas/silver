<?php namespace Bagito\Storage;

use Quotation;
use Project;

class EloquentQuotationRepository implements QuotationRepository
{

	public function create($userId,$projectId,$inputs)
	{
		$quotation = new Quotation;
		$quotation->project_id = $projectId;
		$quotation->user_id = $userId;
		$quotation->remarks = $inputs['remarks'];
		$quotation->title = $inputs['title'];
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

}