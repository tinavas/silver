<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Budget extends \Eloquent {

	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];

	public function project() {
		return $this->belongsTo('Project');
	}	
}