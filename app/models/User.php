<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function userLoad()
	{
		return $this->belongsToMany('Project','user_load');
	}

	public function roles()
	{
		return $this->belongsToMany('Group','users_groups');
	}

	public function project()
	{
		return $this->belongsToMany('Project','user_load');
	}

	public function quotations()
	{
		return $this->hasMany('Quotation');
	}
}