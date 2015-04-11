<?php namespace Bagito\Storage;

interface ValueRepository{

	public function find($id);

	public function create($inputs);

	public function update($id, $inputs);

}