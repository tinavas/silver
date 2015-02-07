<?php

class Entry extends Eloquent
{
	/* Custom table name */
	protected $table = "entries";

	public function quotation()
	{
		return $this->belongsTo('Quotation');
	}

}