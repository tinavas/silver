<?php namespace Bagito\Storage;

interface ValueRepository{

	public function find($id);
	public function create($entry_id,$quotation_id,$inputs);
	public function update($id, $inputs);
	public function newQuotation($quotation_id);

	public function getValue($quotation_id, $entry_id);
	public function getSumOfQuotation($quotation_id);
	public function getAllMaterialsFrom($quotation_id);

}