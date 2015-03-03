<?php
use Bagito\Storage\EntryRepository as Entry;
class EntryController extends BaseController
{
	public function __construct(Entry $entry)
	{
		$this->entry = $entry;
	}
	
	public function create($id){
		$parentsArray = $this->entry->getParents($id);
		$subsArray = $this->entry->getSubHeaders($id);
		$subs = array();
		$parents = array();
		foreach($parentsArray as $parent)
		{
			$parents[$parent->id] = $parent->description;
		}

		foreach($subsArray as $sub)
		{
			$subs[$sub->id] = $sub->description;
		}
		$parentsArray = $this->entry->getHeaders($id);
		return View::make('architect.entry.create',compact('parents','id','subs'))->with('entries',$parentsArray);
	}
	public function store($id){
		$rules = array();
		$option = Input::get('type');
		if($option == 1){
			$rules = [
						'description' => 'required',
						'type' => 'required'
					 ];
		}else if($option == 2){
			$rules = [
						'description' => 'required',
						'type' => 'required',
						'parent_id_sub' => 'required'
						];
		}else{
			$rules = [
					 	'description' => 'required', 
					 	'type' => 'required',
					 	'parent_id' => 'required',
					 	'quantity'=> 'required|numeric',
					 	'price' => 'required|numeric'
					 ];
		}

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$this->entry->store($id, Input::all());
			Session::flash('message','Entry Added');
			return Redirect::back();
		}
	}
	public function remove($id)
	{
		$this->entry->remove($id);
		return Redirect::back();
	}

	public function show($id)
	{

		$parentsArray = $this->entry->getParents($id);
		$subsArray = $this->entry->getSubHeaders($id);
		$subs = array();
		$parents = array();
		foreach($parentsArray as $parent)
		{
			$parents[$parent->id] = $parent->description;
		}

		foreach($subsArray as $sub)
		{
			$subs[$sub->id] = $sub->description;
		}
		$parentsArray = $this->entry->getHeaders($id);
		return View::make('architect.approve.show',compact('parents','id','subs'))->with('entries',$parentsArray);
	}
}