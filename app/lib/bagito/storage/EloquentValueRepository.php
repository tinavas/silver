<?php namespace Bagito\Storage;

use Value;

class EloquentValuesRepository implements ValuesRepository{

	public function find($id) {
		return Value::find($id);
	}

	public function create($inputs){
		$value = new Value();

		$value->quantity = $inputs['quantity'];
		$value->ul = $inputs['ul'];
		$value->um = $inputs['um'];
		$value->tl = $inputs['tl'];
		$value->tm = $inputs['tm'];
		$value->dc = $inputs['dc'];

		$value->entry_id = $inputs['entry_id'];
		$value->quotation_id = $inputs['quotation_id'];

		$value->save();
	}

	public function update($id, $inputs){
		$value = Value::find($id);

		$value->quantity = $inputs['quantity'];
		$value->ul = $inputs['ul'];
		$value->um = $inputs['um'];
		$value->tl = $inputs['tl'];
		$value->tm = $inputs['tm'];
		$value->dc = $inputs['dc'];

		$value->entry_id = $inputs['entry_id'];
		$value->quotation_id = $inputs['quotation_id'];

		$value->save();
	}
}