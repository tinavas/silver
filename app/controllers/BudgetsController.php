<?php

use Bagito\Storage\BudgetRepository as Budget;
use Bagito\Storage\ProjectRepository as Project;

class BudgetsController extends \BaseController {

	function __construct(Budget $budget, Project $project){
		$this->layout = 'template';

		$this->budget = $budget;
		$this->project = $project;
	}

	/**
	 * Display a listing of the resource.
	 * GET /budgets
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$budgets = $this->budget->getAllByProject($id);
		$project = $this->project->find($id);
		$this->layout->content = View::make('admin.budgets.index',compact('budgets','project'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /budgets/create
	 *
	 * @return Response
	 */
	public function create($id)
	{
		return View::make('admin.budgets.create',compact('id'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /budgets
	 *
	 * @return Response
	 */
	public function store($id)
	{
		$rules = [
					'description' => 'required',
					'amount'	  => 'required|numeric'
				 ];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}
		$this->budget->add($id,Input::all());
		return Redirect::to('/admin/budget/' . $id);
	}

	/**
	 * Display the specified resource.
	 * GET /budgets/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /budgets/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$budget = $this->budget->find($id);
		return View::make('admin.budgets.edit',compact('budget'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /budgets/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [
					'description' => 'required',
					'amount'	  => 'required|numeric'
				 ];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}
		$this->budget->add($id,Input::all());
		return Redirect::to('/admin/budget/' . $id);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /budgets/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->budget->delete($id);
		return Redirect::back();
	}

}