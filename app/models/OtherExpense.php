<?php

class OtherExpense extends Eloquent{
	
	protected $table = "other_expenses";

	public function value($id) {

		return $this->hasMany('ExpensesValue','expense_id')->where('quotation_id',$id);

	}
}