<?php namespace Bagito\Storage;

use ExpensesValue;
use OtherExpense;

class EloquentExpensesValueRepository implements ExpensesValueRepository{

	public function find($id) {
		return ExpensesValue::find($id);
	}


	public function create($expense_id,$inputs){
		$expenses = new ExpensesValue();

		$expenses->cost = $inputs['cost'];
		$expenses->expense_id = $expense_id;

		$expenses->save();
	}

	public function update($id, $inputs){
		$expenses = ExpensesValue::find($id);

		$expenses->cost = $inputs['cost'];
		$expenses->expense_id = $expense_id;
		
		$expenses->save();
	}

	public function newQuotation($quotation_id){
		$expenses = OtherExpense::all();
		foreach($expenses as $expense){
			$value = new ExpensesValue();
			$value->cost = 0;
			$value->expense_id = $expense->id;
			$value->quotation_id = $quotation_id;
			$value->save();
		}
	}
}