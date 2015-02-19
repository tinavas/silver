<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ChildEntry extends Eloquent
{
	use SoftDeletingTrait;
	protected $table = "child_entries";
    protected $dates = ['deleted_at'];

	public function entry()
	{
		return $this->belongsTo('Entry','child_id')->get();
	}

	public function entryWithTrashed()
	{
		return $this->belongsTo('Entry','child_id')->withTrashed();
	}
}