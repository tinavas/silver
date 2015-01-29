<?php

class UserLoad extends Eloquent
{
	protected $table = "user_load";

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function project()
	{
		return $this->belongsTo('Project');
	}
}