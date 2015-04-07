<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Budget extends \Eloquent {

	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];

	public function quotation() {
		return $this->belongsTo('Quotation');
	}

	public function entry(){
		return $this->belongsTo('Entry');
	}

	public function supplier(){
		return $this->belongsTo('Supplier');
	}
}