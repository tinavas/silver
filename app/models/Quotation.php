<?php 

class Quotation extends Eloquent
{
	public function project()
	{
		return $this->belongsTo('Project');
	}

	public function entries()
	{
		return $this->hasMany('Entry');
	}
	public function user()
	{
		return $this->belongsTo('User');
	}
}