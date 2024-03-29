<?php namespace Bagito\Storage;

use Supplier;

class EloquentSupplierRepository implements SupplierRepository{

	public function find($id){
		return Supplier::find($id);
	}

	public function all(){
		return Supplier::all();
	}

	public function add($inputs){
		$supplier = new Supplier();
		$supplier->supplier_name = $inputs['supplier_name'];
		$supplier->description = $inputs['description'];
		$supplier->address = $inputs['address'];
		$supplier->remarks = $inputs['remarks'];
		$supplier->save();
	}

	public function update($id, $inputs){
		$supplier = Supplier::find($id);
		$supplier->supplier_name = $inputs['supplier_name'];
		$supplier->description = $inputs['description'];
		$supplier->address = $inputs['address'];
		$supplier->remarks = $inputs['remarks'];
		$supplier->save();
	}

	public function delete($id){
		 $supplier = Supplier::find($id);
		 $supplier->delete();
	}

	public function paginate($pages)
	{
		return Supplier::paginate($pages);
	}

	public function search($keyword,$pages)
	{
		return Supplier::where('supplier_name', 'LIKE' , "%$keyword%")
					->orWhere('description', 'LIKE', "%$keyword%")
					->orWhere('address','LIKE',"%$keyword%")
					->orWhere('remarks','LIKE',"%$keyword%")->paginate($pages);
	}

	public function lists(){
		return Supplier::lists('supplier_name','id');
	}
}