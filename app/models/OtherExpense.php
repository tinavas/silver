<?php

class OtherExpense extends Eloquent{
	protected $table = "other_expenses";

	public function quotation(){
		return $this->belongsTo('Quotation');
	}
}