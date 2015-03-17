<?php namespace Bagito\Storage;

use Entry; 
use Quotation;
use ChildEntry;

class EloquentEntryRepository implements EntryRepository
{
	public function	getParents($quotation_id)
	{
		return Entry::where('quotation_id',$quotation_id)->where('level',1)->get();
	}

	public function getSubHeaders($quotation_id)
	{
		return Entry::where('quotation_id',$quotation_id)->where('level','=',2)->get();
	}

	public function store($quotation_id, $inputs)
	{
		$entry = new Entry();
		$entry->description = $inputs['description'];
		$entry->quantity = $inputs['quantity'];
		$entry->level = $inputs['type'];
		$entry->unit = $inputs['unit'];
		$entry->um = $inputs['um'];
		$entry->ul = $inputs['ul'];
		$entry->tm = $inputs['um'] * $inputs['quantity'];
		$entry->tl = $inputs['ul'] * $inputs['quantity'];
		$entry->dc = $entry->tm + $entry->tl;
		$entry->quotation_id = $quotation_id;
		$entry->save();
	
		if($entry->level == 2)
		{
			$child = new ChildEntry();

			$child->child_id = $entry->id;
			$child->parent_id = $inputs['parent_id_sub'];
			$child->save();
		}
		else if($entry->level == 3)
		{
			$child = new ChildEntry();

			$child->child_id = $entry->id;
			$child->parent_id = $inputs['parent_id'];
			$child->save();
		}
	}

	public function getHeaders($quotation_id)
	{
		return Entry::where('quotation_id',$quotation_id)->where('level',1)->get();
	}

	public function remove($id)
	{
		$entry = Entry::find($id);
		$children = $entry->child();
		foreach($children as $e)
		{	
			$e->entry()->delete();	
		}
		$entry->childWithThrashed()->delete();
		$entry->delete();
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
}