<?php namespace Bagito\Storage;

interface BudgetRepository{

	public function find($id);

	public function getAllByProject($id);

	public function add($projectId, $inputs);

	public function update($id, $inputs);

	public function delete($id);
	
}