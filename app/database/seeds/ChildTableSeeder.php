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
		$entry->parent_id = 14;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Panel MDP';
		$entry->unit = 'ASSY';
		$entry->level = 3;
		$entry->parent_id = 15;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Panel LP';
		$entry->unit = 'ASSY';
		$entry->level = 3;
		$entry->parent_id = 15;
		$entry->save();		

		$entry = new Entry();
		$entry->description = 'Panel PAC';
		$entry->unit = 'ASSY';
		$entry->level = 3;
		$entry->parent_id = 15;
		$entry->save();

		$entry = new Entry();
		$entry->description = '8-40AT, 2P, 230V, BOLT-ON IN NEMA-3R ENCLOSURE';
		$entry->unit = 'SET';
		$entry->level = 3;
		$entry->parent_id = 15;
		$entry->save();

		$entry = new Entry();
		$entry->description = '1-30AT, 2P, 230V, BOLT-ON IN NEMA-3R ENCLOSURE';
		$entry->unit = 'SET';
		$entry->level = 3;
		$entry->parent_id = 15;
		$entry->save();

		$entry = new Entry();
		$entry->description = '2-20AT, 2P, 230V, BOLT-ON IN NEMA-3R ENCLOSURE';
		$entry->unit = 'SET';
		$entry->level = 3;
		$entry->parent_id = 15;
		$entry->save();

		$entry = new Entry();
		$entry->description = '63mm Ø IMC Pipe , With Coupling';
		$entry->unit = 'PCS';
		$entry->level = 3;
		$entry->parent_id = 16;
		$entry->save();

		$entry = new Entry();
		$entry->description = '63mm Ø IMC Locknut and Bushing';
		$entry->unit = 'PAIRS';
		$entry->level = 3;
		$entry->parent_id = 16;
		$entry->save();

		$entry = new Entry();
		$entry->description = '63mm Ø Entrance Cap';
		$entry->unit = 'PAIRS';
		$entry->level = 3;
		$entry->parent_id = 16;
		$entry->save();

		$entry = new Entry();
		$entry->description = '32mm Ø PVC Pipe , With Coupling';
		$entry->unit = 'PCS';
		$entry->level = 3;
		$entry->parent_id = 16;
		$entry->save();

		$entry = new Entry();
		$entry->description = '32mm Ø PVC Adopter w/ Locknut';
		$entry->unit = 'PAIRS';
		$entry->level = 3;
		$entry->parent_id = 16;
		$entry->save();

		$entry = new Entry();
		$entry->description = '25mm  Ø PVCPipe, With Coupling';
		$entry->unit = 'PCS';
		$entry->level = 3;
		$entry->parent_id = 16;
		$entry->save();

		$entry = new Entry();
		$entry->description = '25mm  Ø PVC Connector/Adoptor';
		$entry->unit = 'PAIRS';
		$entry->level = 3;
		$entry->parent_id = 16;
		$entry->save();

		$entry = new Entry();
		$entry->description = '20mm Ø PVC Pipe , With Coupling';
		$entry->unit = 'PCS';
		$entry->level = 3;
		$entry->parent_id = 16;
		$entry->save();

		$entry = new Entry();
		$entry->description = '20mm Ø PVC Elbow';
		$entry->unit = 'PCS';
		$entry->level = 3;
		$entry->parent_id = 16;
		$entry->save();

		$entry = new Entry();
		$entry->description = '20mm Ø PVC  Connector/Adoptor';
		$entry->unit = 'PCS';
		$entry->level = 3;
		$entry->parent_id = 16;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Utility Box G.I';
		$entry->unit = 'PCS';
		$entry->level = 3;
		$entry->parent_id = 16;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Junction Boxes G.I';
		$entry->unit = 'PCS';
		$entry->level = 3;
		$entry->parent_id = 16;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Square Boxes G.I';
		$entry->unit = 'PCS';
		$entry->level = 3;
		$entry->parent_id = 16;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'G.I. Tie Wire';
		$entry->unit = 'PCS';
		$entry->level = 3;
		$entry->parent_id = 16;
		$entry->save();

		$entry = new Entry(); 
		$entry->description = '15mm  Ø Grounding Rod';
		$entry->unit = 'PC';
		$entry->level = 3;
		$entry->parent_id = 16;
		$entry->save();

		$entry = new Entry();
		$entry->description = '15mm  Ø Grounding Terminal Clamp';
		$entry->unit = 'PC';
		$entry->level = 3;
		$entry->parent_id = 16;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Hangers and Suppors';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 17;
		$entry->save();

		$entry = new Entry();
		$entry->description = '50mm2 THHN';
		$entry->unit = 'M';
		$entry->level = 3;
		$entry->parent_id = 18;
		$entry->save();

		$entry = new Entry();
		$entry->description = '22mm2 THHN';
		$entry->unit = 'M';
		$entry->level = 3;
		$entry->parent_id = 18;
		$entry->save();

		$entry = new Entry();
		$entry->description = '14mm2 THHN';
		$entry->unit = 'M';
		$entry->level = 3;
		$entry->parent_id = 18;
		$entry->save();

		$entry = new Entry();
		$entry->description = '8.0mm2 THHN';
		$entry->unit = 'ROLLS';
		$entry->level = 3;
		$entry->parent_id = 18;
		$entry->save();

		$entry = new Entry();
		$entry->description = '5.5mm2 THHN';
		$entry->unit = 'ROLLS';
		$entry->level = 3;
		$entry->parent_id = 18;
		$entry->save();

		$entry = new Entry();
		$entry->description = '3.5mm2 THHN';
		$entry->unit = 'ROLLS';
		$entry->level = 3;
		$entry->parent_id = 18;
		$entry->save();

		$entry = new Entry();
		$entry->description = '2.0mm2 THHN';
		$entry->unit = 'ROLLS';
		$entry->level = 3;
		$entry->parent_id = 18;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'CAT-5 - 5/P Cable D-Link Brand';
		$entry->unit = 'M';
		$entry->level = 3;
		$entry->parent_id = 18;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'CAT-5 - 2/P Cable D-Link Brand';
		$entry->unit = 'M';
		$entry->level = 3;
		$entry->parent_id = 18;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'RG59 Coaxial Cable';
		$entry->unit = 'M';
		$entry->level = 3;
		$entry->parent_id = 18;
		$entry->save();

		$entry = new Entry();
		$entry->description = '#18 AWG T.F Wire';
		$entry->unit = 'M';
		$entry->level = 3;
		$entry->parent_id = 18;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Miscellaneous';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 18;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Single Convenience Outlet';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 19;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Duplex Convenience Outlet';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 19;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Data Outlet';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 19;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'CATV Outlet';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 19;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Telephone Outlet';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 19;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Wall Switches One Gang';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 19;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Wall Switches Two Gang';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 19;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Pinlights square';
		$entry->unit = 'PC';
		$entry->level = 3;
		$entry->parent_id = 20;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'T-5 Fluorescent Light';
		$entry->unit = 'M';
		$entry->level = 3;
		$entry->parent_id = 20;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Emergency Lights';
		$entry->unit = 'PC';
		$entry->level = 3;
		$entry->parent_id = 20;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Smoke Detector';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 21;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Heat Detector';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 21;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'FACD 4 Zones (Conventional)';
		$entry->unit = 'SET';
		$entry->level = 3;
		$entry->parent_id = 21;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Fire Bell and Manual Pull Station';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 21;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Telephone Terminal Cabinet (TTC)';
		$entry->unit = 'ASSY';
		$entry->level = 3;
		$entry->parent_id = 21;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Exit Light ';
		$entry->unit = 'ASSY';
		$entry->level = 3;
		$entry->parent_id = 21;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Testing and Commissioning';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 22;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Mobilization';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 22;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'As-Built Plan';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 22;
		$entry->save();

		$entry = new Entry();
		$entry->description = 'Water closet (OSM)';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 23;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Urinal (OSM)';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 23;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Lavatory (OSM)';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 23;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Lavatory Faucet (OSM)';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 23;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Stainless Steel Kitchen Sink';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 23;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Slop Sink Faucet (OSM)';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 23;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Floor Drain';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 23;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Miscellaneous';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 23;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Sub-meter';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 23;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Septic Tank (As Per Plan)';
		$entry->unit = 'UNIT';
		$entry->level = 3;
		$entry->parent_id = 23;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Toilet Paper Holder (OSM)';
		$entry->unit = 'PCS';
		$entry->level = 3;
		$entry->parent_id = 24;
		$entry->save();

		$entry = new Entry();
		$entry->description = '1100mm x 60mm x 6mm THK mirror on 6mm THK marine plywood backing';
		$entry->unit = 'SETS';
		$entry->level = 3;
		$entry->parent_id = 24;
		$entry->save();
		
		$entry = new Entry();
		$entry->description = 'Roughing-ins and Accessories';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 25;
		$entry->save();

		$entry = new Entry();
		$entry->description = ' 1.5 HP wall Mounted Aircon Unit';
		$entry->unit = 'PC';
		$entry->level = 3;
		$entry->parent_id = 26;
		$entry->save();

		$entry = new Entry();
		$entry->description = ' 1Hp Wall Mounted Aircon Unit';
		$entry->unit = 'PC';
		$entry->level = 3;
		$entry->parent_id = 26;
		$entry->save();

		$entry = new Entry();
		$entry->description = ' Exhaust Grille';
		$entry->unit = 'PC';
		$entry->level = 3;
		$entry->parent_id = 26;
		$entry->save();

		$entry = new Entry();
		$entry->description = ' Fresh Air Grille';
		$entry->unit = 'PC';
		$entry->level = 3;
		$entry->parent_id = 26;
		$entry->save();

		$entry = new Entry();
		$entry->description = ' Ducting';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 26;
		$entry->save();

		$entry = new Entry();
		$entry->description = ' Air Duct Blower';
		$entry->unit = 'LOT';
		$entry->level = 3;
		$entry->parent_id = 26;
		$entry->save();

		
	}
}