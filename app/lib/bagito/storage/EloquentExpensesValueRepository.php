<?php namespace Bagito\Storage;

use ExpensesValue;

class EloquentExpensessRepository implements ExpensessRepository{

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
}