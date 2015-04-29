<?php

class Material extends Eloquent{
	
	public function entry() {
		return $this->belongsTo('Entry');
	}

	public function supplier(){
		return $this->belongsTo('Supplier');
	}
}