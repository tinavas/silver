<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Entry extends Eloquent
{
	use SoftDeletingTrait;
	/* Custom table name */
	protected $table = "quotation_entries";
    protected $dates = ['deleted_at'];

	public function quotation()
	{
		return $this->belongsTo('Quotation');
	}

	public function child()
	{
		return $this->hasMany('ChildEntry','parent_id')->get();
	}

	public function childWithThrashed()
	{
		return $this->hasMany('ChildEntry','parent_id')->withTrashed();
	}

	public function children()
	{
		return $this->hasMany('ChildEntry','parent_id');
	}
}