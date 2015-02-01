<?php

class Project extends Eloquent
{
	public function author()
	{
		return $this->belongsTo('User');
	}

	public function attachments()
	{
		return $this->hasMany('Attachment');
	}

	public function entries()
	{
		return $this->hasMany('Entry');
	}

	public function users()
	{
		return $this->belongsToMany('User','user_load');
	}

	public function subscribers()
	{
		return $this->belongsToMany('User','user_load')->with('architect')->first();
	}
}