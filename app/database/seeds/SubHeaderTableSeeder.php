<?php

class SubHeaderTableSeeder extends Seeder{

	public function run(){
		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Preliminaries';
		$entry->parent_id = 1;
		$entry->save();

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Partitional Works';
		$entry->parent_id = 2; 
		$entry->save();

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Floor Finishes';
		$entry->parent_id = 2; 
		$entry->save();

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Wall Finishes';
		$entry->parent_id = 2;
		$entry->save(); 

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Ceiling Finishes';
		$entry->parent_id = 2;
		$entry->save(); 

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Doors';
		$entry->parent_id = 2;
		$entry->save(); 

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Cashier';
		$entry->parent_id = 2; 
		$entry->save();

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Glass Works';
		$entry->parent_id = 2;
		$entry->save();

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Miscellaneous';
		$entry->parent_id = 2;
		$entry->save(); 

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Panel Boards';
		$entry->parent_id = 3;
		$entry->save(); 

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Conduit Boxes and Fittings';
		$entry->parent_id = 3;
		$entry->save(); 

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Hangers and Supports';
		$entry->parent_id = 3;
		$entry->save();

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Wires and Cables';
		$entry->parent_id = 3;
		$entry->save(); 

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Wiring Devices';
		$entry->parent_id = 3;
		$entry->save(); 

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Lighting Fixtures';
		$entry->parent_id = 3;
		$entry->save(); 

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Auxiliary Systems';
		$entry->parent_id = 3; 
		$entry->save();

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Miscellaneous';
		$entry->parent_id = 3; 
		$entry->save();

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Toilet/Kitchen Fixtures';
		$entry->parent_id = 4; 
		$entry->save();

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Toilet Accessories';
		$entry->parent_id = 4; 
		$entry->save();

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Rough-ins';
		$entry->parent_id = 4; 
		$entry->save();

		$entry = new Entry();
		$entry->level = 2;
		$entry->description = 'Mechanical Works';
		$entry->parent_id = 5;
		$entry->save();
	}
}