<?php namespace Bagito\Storage;

use Budget;

class EloquentBudgetRepository implements BudgetRepository{

	public function find($id){
		return Budget::find($id);
	}

	public function add($projectId, $inputs){
		$budget = new Budget();
		$budget->project_id = $projectId;
		$budget->amount = $inputs['amount'];
		$budget->remarks = $inputs['remarks'];
		$budget->description = $inputs['description'];
		$budget->save();
	}

	public function update($id, $inputs){
		$budget = Budget::find($id);
		$budget->amount = $inputs['amount'];
		$budget->remarks = $inputs['remarks'];
		$budget->description = $inputs['description'];
		$budget->save();
	}

	public function delete($id){
		 $budget = Budget::find($id);
		 $budget->delete();
	}

	public function getAllByProject($id){
		return Budget::where('project_id', $id)->get();
	}
}