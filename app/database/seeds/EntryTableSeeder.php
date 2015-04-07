<?php

class EntryTableSeeder extends Seeder{

	public function run(){
		$entry = new Entry();
		$entry->description = 'Preliminaries';
		$entry->level = 1;
		$entry->save();
	
		$entry = new Entry();
		$entry->description = 'Architectural Works';
		$entry->level = 1;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Electrical Works';
		$entry->level = 1;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Plumbing Works';
		$entry->level = 1;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Mechanical Works';
		$entry->level = 1;
		$entry->save();
	}
}