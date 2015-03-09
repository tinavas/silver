<?php namespace Bagito\Storage;

 interface EntryRepository
 {
 	public function getParents($quotation_id);
 	public function store($quotation_id, $inputs);
 	public function getHeaders($quotation_id);
 	public function remove($id);
 	public function verifyEntry($userId, $entryId);
 }