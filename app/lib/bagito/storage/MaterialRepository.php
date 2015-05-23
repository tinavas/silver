<?php namespace Bagito\Storage;

interface MaterialRepository {
	
	//find. duuh
	public function find($id);

	//remove that shit;
	public function remove($id);

	public function create($quotation_id, $supplier_id, $quantity, $amount, $remarks, $entry_id, $file_name);
}