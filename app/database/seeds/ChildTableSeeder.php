<?php

class ChildTableSeeder extends Seeder{

	public function run(){
		$entry = new Entry();
		$entry->description = 'Mobilization / Demobilization';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 6;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Temporary Facilities';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 6;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Demolition Works';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 6;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'General Cleaning and Clearing of Site';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 6;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Tools and Equipment';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 6;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Handling and Hauling of Materials';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 6;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Testing and Commissioning';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 6;
		$entry->save();

		$entry = new Entry();
		$entry->description = '100 mm chb wall';
		$entry->unit = 'SQM';
		$entry->level = 3;
		$entry->parent_id = 7;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Drywall wall Partition';
		$entry->unit = 'SQM';
		$entry->level = 3;
		$entry->parent_id = 7;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Designed Wood Slats';
		$entry->unit = 'SQM';
		$entry->level = 3;
		$entry->parent_id = 7;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'FF-01 600x600mm non-skid Homogenous Tiles (Architect White Rock,Architect White Matt)';
		$entry->unit = 'SQM';
		$entry->level = 3;
		$entry->parent_id = 8;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'FF-03 300x300mm non-skid Ceramic tiles (Maskara White)';
		$entry->unit = 'SQM';
		$entry->level = 3;
		$entry->parent_id = 8;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'FF-4A 600x600mm Carpet Tiles Blue';
		$entry->unit = 'SQM';
		$entry->level = 3;
		$entry->parent_id = 8;
		$entry->save();

		$entry = new Entry();
		$entry->description = '300x300mm Ceramic tiles (Maskara White)';
		$entry->unit = 'SQM';
		$entry->level = 3;
		$entry->parent_id = 9;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Painted Finish (color to be verified)';
		$entry->unit = 'SQM';
		$entry->level = 3;
		$entry->parent_id = 9;
		$entry->save();		

		$entry = new Entry();
		$entry->description = 'Laminated Finish';
		$entry->unit = 'SQM';
		$entry->level = 3;
		$entry->parent_id = 9;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'CF-1 12mm thk. Gypsum Board on Metal Furring on Latex Flat Painted Finish';
		$entry->unit = 'SQM';
		$entry->level = 3;
		$entry->parent_id = 10;
		$entry->save();	

		$entry = new Entry();
		$entry->description = 'Cove Ceiling Painted finish (color to be verified)';
		$entry->unit = 'LM';
		$entry->level = 3;
		$entry->parent_id = 10;
		$entry->save();	

		$entry = new Entry();
		$entry->description = 'D1- 2100x900mm - Glass door & 12mm thk. clear Tempered glass door frameless ';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 11;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'D5- 2100x700mm - 45mm thk. Hollow Core HDF door w/ Wooden Louver';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 11;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'D6- 2100x600mm - 45mm thk. Hollow Core HDF door w/ Wooden Louver';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 11;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'D7- 2100x500mm - 45mm thk. Hollow Core HDF door w/ Wooden Louver';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 11;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Cahier Drawers in Ducco Finish';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 12;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Cashier Booth with Shelves';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 12;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Granite countertop for Cashier Counter';
		$entry->unit = 'LM';
		$entry->level = 3;
		$entry->parent_id = 12;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'EE Cabinet Painted Finish';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 12;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Cahier Glass w/ Holes';
		$entry->unit = 'SQM';
		$entry->level = 3;
		$entry->parent_id = 13;
		$entry->save();


		$entry = new Entry();
		$entry->description = 'Cahier Glass w/ Holes';
		$entry->unit = 'SQM';
		$entry->level = 3;
		$entry->parent_id = 13;
		$entry->save();


		$entry = new Entry();
		$entry->description = 'Signage';
		$entry->unit = 'PCS';
		$entry->level = 3;
		$entry->parent_id = 13;
		$entry->save();


	}
}