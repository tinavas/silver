<?php namespace Bagito\Storage;

interface ProjectRepository
{
	public function find($id);

	public function all();

	public function create($inputs);

	public function update($id, $inputs);

	public function paginate($number);

	public function search($keyword,$pages);

	public function getNumberOfSubscribers($id);

}