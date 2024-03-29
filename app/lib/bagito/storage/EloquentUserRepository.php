<?php namespace Bagito\Storage;

use Sentry;
use User;
use UserGroup;

class EloquentUserRepository implements UserRepository
{

	public function find($id)
	{
		return User::find($id);
	}

	public function all()
	{
		return User::all();
	}

	public function create($inputs)
	{
		try {
			if($inputs['role'] == 0)
			{
				$role = Sentry::findGroupByName('Administrator');
			}
			else if($inputs['role'] == 2)
			{
				$role = Sentry::findGroupByName('Secretary');
			}
			else
			{
				$role = Sentry::findGroupByName('Architect');
			}
			/*Add user to group*/
			$user = Sentry::createUser([
					"email" => $inputs['email'],
					"password" => $inputs['password'],
					"address" => $inputs['address'],
					"contact_number" => $inputs['contactno'],
					"gender" => $inputs['gender'] == "male" ? 1 : 0,
					"first_name" => $inputs['firstname'],
					"last_name" => $inputs['lastname'],
					"middle_initial" => $inputs['middlename'],
					'activated' => true
				]);
			$user->addGroup($role);
		} catch (Cartalyst\Sentry\Users\UserExistsException $e) {
			throw new Exception('User Already Exists');
		}
		
		return $user;
	}

	public function update($id, $inputs)
	{
		try 
		{
			//get the goddamn user using sentry
			$user = Sentry::findUserById($id);

			$user->address =  $inputs['address'];
			$user->contact_number = $inputs['contactno'];
			$user->gender = $inputs['gender'] == "Male" ? 1 : 0;
			$user->first_name = $inputs['firstname'];
			$user->last_name = $inputs['lastname'];
			$user->middle_initial = $inputs['middlename'];
			
			$user->save();
		} 
		catch (\Cartalyst\Sentry\Users\UserExistsException $e) 
		{
			throw new Exception('User Already Exists');
		} 
		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			throw new Exception('User not found');
		}

		return $user;
	}

	public function getRole($id)
	{
		try 
		{	
			$user = Sentry::findUserByID($id);
			return $user->getGroups()[0];
		} catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
			throw new Exception('User was not found');
		}
	}

	public function paginate($pages)
	{
		return User::paginate($pages);
	}

	public function search($keyword,$pages)
	{
		return User::where('first_name', 'LIKE' , "%$keyword%")
					->orWhere('last_name', 'LIKE', "%$keyword%")
					->orWhere('email','LIKE',"%$keyword%")->paginate($pages);
	}

	public function getAllArchitects()
	{
		$results =  UserGroup::where('group_id' , '=' , 2)->get();
		$ids = array();
		foreach($results as $result)
		{
			array_push($ids,$result->user_id);
		}

		if(count($ids) != 0)
		{
			$users = User::whereIn('id', $ids)->get();
		}
		else
		{
			$users = null;
		}

		return  $users;
	}

	public function getProjects($user)
	{
		return $user->project()->get();
	}

	public function getAllAdmins(){
		$results =  UserGroup::where('group_id' , '=' , 1)->get();
		$ids = array();
		foreach($results as $result)
		{
			array_push($ids,$result->user_id);
		}

		if(count($ids) != 0)
		{
			$users = User::whereIn('id', $ids)->get();
		}
		else
		{
			$users = null;
		}

		return  $users;
	}
}