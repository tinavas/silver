<?php namespace Bagito\Storage;

use Budget;

class EloquentBudgetRepository implements BudgetRepository{

	public function find($id){
		return Budget::find($id);
	}

	public function add($projectId, $inputs){
		$budget = new Budget();
		$budget->project_id = $projectId;
		$budget->amount = Inputs::get('amount');
		$budget->remarks = Inputs::get('remarks');
		$budget->description = Inputs::get('description');
		$budget->save();
	}

	public function update($id, $inputs){
		$budget = Budget::find($id);
		$budget->project_id = $projectId;
		$budget->amount = Inputs::get('amount');
		$budget->remarks = Inputs::get('remarks');
		$budget->description = Inputs::get('description');
		$budget->save();
	}

	public function delete($id, $inputs){
		 $budget = Budget::find($id);
		 $budget->delete();
	}

	public function getAllByProject($id){
		return Budget::where('project_id', $id);
	}
}