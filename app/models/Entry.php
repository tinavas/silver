<?php

class Entry extends Eloquent
{
	/* Custom table name */
	protected $table = "entries";

	public function project()
	{
		return $this->belongsTo('Project');
	}

}