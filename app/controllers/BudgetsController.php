<?php

class BudgetsController extends \BaseController {

	function __construct(){
		$this->layout = 'template';
		$this->beforeFilter('csrf', array('only' =>
                    array('store', 'update', 'destroy')));
	}

	/**
	 * Display a listing of the resource.
	 * GET /budgets
	 *
	 * @return Response
	 */
	public function index($id)
	{
		
		$this->layout->content = View::make('admin.budgets.index');
		
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /budgets/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /budgets
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
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
		//
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
		//
	}

}