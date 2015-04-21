<?php namespace Bagito\Storage;

interface OtherExpensesRepository{

	public function find($id);
	public function create($inputs);
	public function update($id, $inputs);
	public function all();

}