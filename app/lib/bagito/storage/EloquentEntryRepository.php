<?php namespace Bagito\Storage;

use Entry; 
use Quotation;

class EloquentEntryRepository implements EntryRepository
{
	public function	getParents($quotation_id)
	{
		return Entry::where('quotation_id',$quotation_id)->where('level','!=',3)->get();
	}
}