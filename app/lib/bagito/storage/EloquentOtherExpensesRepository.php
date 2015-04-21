<?php namespace Bagito\Storage;

use OtherExpense;

class EloquentOtherExpensesRepository implements OtherExpensesRepository{

	public function find($id) {
		return OtherExpense::find($id);
	}


	public function create($inputs){
		$value = new OtherExpense();

		$value->description = $inputs;

		$value->save();
	}

	public function update($id, $inputs){
		$value = OtherExpense::find($id);

		$value->description = $inputs;

		$value->save();
	}

	public function all(){
		return OtherExpense::all();
	}
}