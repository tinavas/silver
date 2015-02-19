<?php namespace Bagito\Storage;

 interface EntryRepository
 {
 	public function getParents($quotation_id);
 }