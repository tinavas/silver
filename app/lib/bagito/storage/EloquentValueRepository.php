<?php namespace Bagito\Storage;

use Value;
use Entry;
use Material;

class EloquentValueRepository implements ValueRepository{

	public function find($id) {
		return Value::find($id);
	}


	public function create($entry_id,$quotation_id,$inputs){
		$value = new Value();

		$value->quantity = $inputs['quantity'];
		$value->ul = $inputs['ul'];
		$value->um = $inputs['um'];
		$value->tl = $inputs['tl'];
		$value->tm = $inputs['tm'];
		$value->dc = $inputs['dc'];

		$value->entry_id = $entry_id;
		$value->quotation_id = $quotation_id;

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
		$value->save();
	}
	
	public function newQuotation($quotation_id){
		$entries = Entry::where('level',3)->get();	
		foreach($entries as $entry){
			$value = new Value();
			$value->quantity = 0;
			$value->ul = 0;
			$value->um = 0;
			$value->tl = 0;
			$value->tm = 0;
			$value->dc = 0;
			$value->material = 0;
			$value->labor = 0;
			$value->total = 0;
			$value->entry_id = $entry->id;
			$value->quotation_id = $quotation_id;
			$value->save();
		}
	}

	public function getValue($quotation_id, $entry_id){
		return Value::where('quotation_id',$quotation_id)->where('entry_id',$entry_id)->first();
	}


	public function getSumOfQuotation($quotation_id){
		return Value::where('quotation_id',$quotation_id)->sum('dc');
	}

	public function getAllMaterialsFrom($quotation_id){
		return Material::where('quotation_id',$quotation_id)->get();
	}
}