<?php

class Attahcment extends Eloquent
{
	public function project()
	{
		return $this->belongsTo('Project');
	}
}