<?php

class Project extends Eloquent
{
	public function user(){
		return $this->belongsTo('User');
	}

}