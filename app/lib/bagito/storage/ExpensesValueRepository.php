<?php namespace Bagito\Storage;

interface ExpensesValueRepository{

	public function find($id);
	public function create($expense_id,$inputs);
	public function update($id, $inputs);

}