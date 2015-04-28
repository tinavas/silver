<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Entry extends Eloquent
{
	use SoftDeletingTrait;
	/* Custom table name */
	protected $table = "quotation_entries";
    protected $dates = ['deleted_at'];

	public function quotation() {
		return $this->belongsTo('Quotation');
	}
	
	public function children() {
		return $this->hasMany('Entry','parent_id');
	}

	public function value($id) {
		return $this->hasMany('Value')->where('quotation_id',$id);
	}

	public function material($id){
		return $this->hasMany('Material')->where('quotation_id',$id);
	}
}