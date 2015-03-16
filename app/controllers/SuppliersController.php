<?php

use Bagito\Auth\AuthRepository as Auth;
use Bagito\Storage\SupplierRepository as Supplier;

class SuppliersController extends \BaseController {

	private $pages = 6;

	public function __construct(Auth $auth, Supplier $supplier){
		$this->layout = 'template';

		$this->auth 	= $auth;
		$this->supplier = $supplier;
	}

	/**
	 * Display a listing of the resource.
	 * GET /suppliers
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$suppliers = $this->supplier->paginate($this->pages);
		$this->layout->content = View::make('admin.suppliers.index',compact('suppliers'))->with('repo',$this->supplier)->with('keyword', '');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /suppliers/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$this->layout->content = View::make('admin.suppliers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /suppliers
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$rules = [
					'supplier_name' => 'required', 
					'address' => 'required'
				 ];

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$user = $this->auth->getCurrentUser();
			$supplier = $this->supplier->add(Input::all());
			return Redirect::to('admin/suppliers/index');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /suppliers/{id}
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
	 * GET /suppliers/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$supplier = $this->supplier->find($id);
		return View::make('admin.suppliers.edit',compact('supplier'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /suppliers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$rules = [
					'supplier_name' => 'required', 
					'address' => 'required'
				 ];

		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$this->supplier->update($id, Input::all());
			return Redirect::to('admin/suppliers');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /suppliers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$this->supplier->delete($id);
		return Redirect::back();
	}

	public function search()
	{
		$keyword = Input::get('keyword');
		$users = $this->supplier->search($keyword,$this->pages);
		return View::make('admin.suppliers.index', compact('suppliers'))->with('repo',$this->supplier)->with('keyword', $keyword);
	}

}