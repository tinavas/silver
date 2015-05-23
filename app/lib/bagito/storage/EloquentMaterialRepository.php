<?php namespace Bagito\Storage;

use Material;

class EloquentMaterialRepository implements MaterialRepository {

	public function find($id) {
		return Material::find($id);
	}

	public function remove($id) {
		$material = Material::find($id);
		$material->delete();
	}

	public function create($quotation_id, $supplier_id, $quantity, $amount, $remarks, $entry_id, $file_name){
		$material = new Material;
		$material->quotation_id = $quotation_id;
		$material->supplier_id = $supplier_id;
		$material->quantity = $quantity;
		$material->amount = $amount;
		$material->remarks = $remarks;
		$material->supplier_id = $supplier_id;
		$material->entry_id = $entry_id;
		$material->filename = $file_name;
		$material->save();
		return $material;
	}
}