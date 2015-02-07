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

	public function getApproved()
	{
		$quotations = Quotation::where('status',2)->get();
		return $quotations;
	}

	public function getRejected()
	{
		$quotations = Quotation::where('status',-1)->get();
		return $quotations;	
	}

	public function getOngoing()
	{
		$quotations = Quotation::where('status',0)->get();
		return $quotations;
	}

	public function find($id)
	{
		$quotation = Quotation::find($id);
		return $quotation;
	}

	public function getActive()
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
		return Quotation::find($id)->
	}

	public function countQuotation($projectId)
	{
		return Project::find($projectId)->quotation()->count();	
	}
}