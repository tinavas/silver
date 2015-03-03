<?php

class Approval extends Eloquent
{
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function quotation()
	{
		return $this->belongsTo('Quotation');
	}
}