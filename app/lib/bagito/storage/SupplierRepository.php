<?php namespace Bagito\Storage;

interface SupplierRepository{

	public function find($id);

	public function all();

	public function add($inputs);

	public function update($id, $inputs);

	public function delete($id);
	
}