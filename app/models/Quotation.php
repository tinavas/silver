<?php 

class Quotation extends Eloquent
{
	public function project() {
		return $this->belongsTo('Project');
	}

	public function user() {
		return $this->belongsTo('User');
	}

	public function values(){
		return $this->hasMany('Values');
	}
}