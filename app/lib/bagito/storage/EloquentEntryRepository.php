<?php namespace Bagito\Storage;

use Entry; 
use Quotation;
use ChildEntry;
use OtherExpense;
use Illuminate\Database\Eloquent\Collection;
use Value;
use ExpensesValue;

class EloquentEntryRepository implements EntryRepository {

	public function find($id){
		return Entry::find($id);
	}

	public function getChildList(){
		return Entry::where('level',3)->lists('description','id');
	}

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
		return Value::where('quotation_id',$id)->sum('dc');
	}

	public function getExpensesSum($id){
		return ExpensesValue::where('quotation_id',$id)->sum('cost');
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
		}else if($type == "expensevalue"){
			$exx = ExpensesValue::find($id);
			$exx->cost = $value; 
			$exx->save();
		}
		
	}

	public function updateEntry($type, $id, $value, $quotationId){
		if($type == "quantity"){
			$v = Value::where('entry_id',$id)->where('quotation_id',$quotationId)->first();
			$v->quantity = $value;
			//update other fields
			$quantity = $value;
			$um = $v->um;
			$ul = $v->ul;

			$v->tm = $quantity * $um;
			$v->tl = $quantity * $ul;
			$v->dc = $v->tm + $v->tl;
			$v->save();
		}else if($type == "um"){
			$v = Value::where('entry_id',$id)->where('quotation_id',$quotationId)->first();
			$v->um = $value;

			//update other fields
			$quantity = $v->quantity;
			$um = $value;

			$v->tm = $quantity * $um;
			$v->dc = $v->tm + $v->tl;
			$v->save();
		}else if($type == "ul"){
			$v = Value::where('entry_id',$id)->where('quotation_id',$quotationId)->first();
			$v->ul = $value;
			
			//update other fields
			$quantity = $v->quantity;
			$ul = $value;

			$v->tl = $quantity * $ul;
			$v->dc = $v->tm + $v->tl;
			$v->save();
		} else if($type == "material") {
			$v = Value::where('entry_id',$id)->where('quotation_id',$quotationId)->first();
			$v->material = $value;

			$v->total = $v->material + $v->labor;
			$v->save();
		} else if($type == "labor") {
			$v = Value::where('entry_id',$id)->where('quotation_id',$quotationId)->first();
			$v->labor = $value;

			$v->total = $v->material + $v->labor;
			$v->save();
		}
	}

	public function getEntryValues($entryID,$quotationID){
		return Value::where('entry_id',$entryID)->where('quotation_id',$quotationID)->first();
	}

}