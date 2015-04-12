<?php namespace Bagito\Storage;

interface ValueRepository{

	public function find($id);
	public function create($entry_id,$quotation_id,$inputs);
	public function update($id, $inputs);
	public function newQuotation($quotation_id);

}