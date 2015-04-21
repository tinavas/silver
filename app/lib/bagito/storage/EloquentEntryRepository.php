<?php namespace Bagito\Storage;

use Entry; 
use Quotation;
use ChildEntry;
use OtherExpense;
use Illuminate\Database\Eloquent\Collection;
use Value;

class EloquentEntryRepository implements EntryRepository
{

	public function all(){
		return Entry::all();
	}

	public function	getParents()
	{
		return Entry::where('level',1)->get();
	}

	public function getParentList(){
		return Entry::where('level',1)->lists('description','id');
	}

	public function getSubHeaders($quotation_id)
	{
		return Entry::where('quotation_id',$quotation_id)->where('level','=',2)->get();
	}

	public function store($inputs)
	{
		$entry = new Entry();
		$entry->description = $inputs['description'];
		$entry->level = $inputs['type'];
		$entry->unit = $inputs['unit'];
		if($entry->level == 2) {
			$entry->parent_id = $inputs['parent_id_sub'];
		}else if($entry->level == 3) {
			$entry->parent_id = $inputs['parent_id'];
		}

		$entry->save();

		$quotations = Quotation::all();
		foreach($quotations as $quotation){
			$value = new Value();
			$value->quantity = 0;
			$value->ul = 0;
			$value->um = 0;
			$value->tl = 0;
			$value->tm = 0;
			$value->dc = 0;
			$value->entry_id = $entry->id;
			$value->quotation_id = $quotation->id;
			$value->save();
		}
	}

	public function getHeaders($quotation_id){
		return Entry::where('quotation_id',$quotation_id)->where('level',1)->get();
	}

	public function remove($id)
	{
		$entry = Entry::find($id);
		$quotation = Quotation::find($entry->quotation_id);
		$children = $entry->child();
		foreach($children as $e) {
			foreach($e->entry() as $child) {
				foreach($child->child() as $h) {
					foreach($h->entry() as $last){
						$last->delete();
					}
				}
				$child->childWithThrashed()->delete();
				$child->delete();
			}
		}
		$entry->childWithThrashed()->delete();
		$entry->delete();
		$quotation->save();
	}

	public function verifyEntry($userId, $entryId)
	{
		$result = Entry::find($entryId);
		$quotation = $result->quotation()->first();
		if(count($quotation) != 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getSum($id){
		return Entry::where('quotation_id',$id)->sum('dc');
	}

	public function getExpensesSum($id){
		return OtherExpense::where('quotation_id',$id)->sum('cost');
	}

	public function getSubs($id){
		$child =  Entry::where('parent_id',$id)->get();
		$parentArray = array();
		foreach($child as $c){
			$array = array();
			$array['id'] = $c->id;
			$array['description'] = $c->description;
			$parentArray[] = $array;
		}
		return Collection::make($parentArray);
	}

	public function update($type, $id, $value){
		if($type == "parent" || $type == "subheader"){
			$entry = Entry::find($id);
			$entry->description = $value;
			$entry->save();
		}else if($type == "child"){
			$entry = Entry::find($id);
			$entry->description = $value;
			$entry->save();
		}else if($type == "unit"){
			$entry = Entry::find($id);
			$entry->unit = $value;
			$entry->save();
		}else if($type == "expense"){
			$expense = OtherExpense::find($id);
			$expense->description = $value;
			$expense->save();
		}
		
	}

}