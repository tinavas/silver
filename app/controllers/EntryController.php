<?php
use Bagito\Storage\EntryRepository as Entry;
class EntryController extends BaseController
{
	public function __construct(Entry $entry)
	{
		$this->entry = $entry;
	}
	
	public function create($id){
		$parents = $this->entry->getParents($id);
		return View::make('architect.entry.create',compact('parents'));
	}
}