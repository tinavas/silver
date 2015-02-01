<?php namespace Bagito\Storage;

interface UserRepository{

	public function find($id);

	public function all();

	public function create($inputs);

	public function update($id, $inputs);

	public function getRole($id);

	public function paginate($number);

	public function search($keyword,$pages);

	public function getAllArchitects();

	public function getProjects($userId);

}