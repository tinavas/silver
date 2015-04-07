<?php namespace Bagito\Storage;

 interface EntryRepository
 {
 	public function getParents();
 	public function store($quotation_id, $inputs);
 	public function getHeaders($quotation_id);
 	public function remove($id);
 	public function verifyEntry($userId, $entryId);
 	public function getSum($id);
 	public function getExpensesSum($id);
 	public function getSubs($id);
 }