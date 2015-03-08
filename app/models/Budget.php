<?php

use Illuminate\Database\Eloquent\SoftDeletes;

class Budget extends \Eloquent {

	use SoftDeletes;
	public $timestamps = false;
	protected $dates = ['deleted_at'];

	public function project(){
		return $this->belongsTo('Project');
	}
	
}