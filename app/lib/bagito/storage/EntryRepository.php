<?php namespace Bagito\Storage;

 interface EntryRepository
 {
 	public function getParents();
 	public function store($inputs);
 	public function getHeaders($quotation_id);
 	public function remove($id);
 	public function verifyEntry($userId, $entryId);
 	public function getSum($id);
 	public function getExpensesSum($id);
 	public function getSubs($id);
 	public function getParentList();
 	public function update($type, $id, $value);
 	public function getEntryValues($entryID);
 }