<?php namespace Bagito\Storage;

use Budget;
use Entry;

class EloquentBudgetRepository implements BudgetRepository{

	public function find($id){
		return Budget::find($id);
	}

	public function add($quotationId, $entryId, $inputs){
		$budget = new Budget();
		$budget->quotation_id = $quotationId;
		$budget->entry_id = $entryId;
		$budget->remarks = $inputs['remarks'];
		$budget->quantity = $inputs['quantity'];
		$budget->unit_price = $inputs['unit_price'];
		$budget->amount = $budget->unit_price * $budget->quantity;
		$budget->save();
		return $budget;
	}

	public function update($id, $inputs){
		$budget = Budget::find($id);
		$budget->amount = $inputs['amount'];
		$budget->remarks = $inputs['remarks'];
		$budget->quantity = $inputs['quantity'];
		$budget->unit_price = $inputs['unit_price'];
		$budget->amount = $budget->unit_price * $budget->quantity;
		$budget->save();
	}

	public function delete($id){
		 $budget = Budget::find($id);
		 $budget->delete();
	}

	public function getAllByQuotation($id){
		return Budget::where('quotation_id', $id)->get();
	}

	public function getTotalMaterialsByQuotationId($id){
		return Entry::where('quotation_id', $id)->sum('tm');
	}

	public function getSumOfBudgetByQuotationId($id){
		return Budget::where('quotation_id',$id)->sum('amount');
	}
	public function getEntryTotalQuantity($id, $entryId){
		return Budget::where('quotation_id',$id)->where('entry_id',$entryId)->sum('quantity');
	}
}