<?php

class Entry extends Eloquent
{
	/* Custom table name */
	protected $table = "quotation_entries";

	public function quotation()
	{
		return $this->belongsTo('Quotation');
	}

}