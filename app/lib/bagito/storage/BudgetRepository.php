<?php namespace Bagito\Storage;

interface BudgetRepository{

	public function find($id);

	public function getAllByQuotation($id);

	public function add($quotationId, $entryId, $inputs);

	public function update($id, $inputs);

	public function delete($id);
	
}