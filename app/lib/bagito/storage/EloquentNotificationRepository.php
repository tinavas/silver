<?php namespace Bagito\Storage;

use Notification;

class EloquentNotificationRepository implements NotificationRepository{

	public function all() {
		return Notification::all();
	}

	public function paginate($pages) {
		return Notification::paginate($pages);
	}

	public function create($id,$inputs){
		$notif = new Notification();

		$notif->user_id = $id;
		$notif->description = $inputs;
		$notif->is_read = 0;

		$notif->save();
	}

	public function updateRead($id){
		$notif = new Notification();
		$notif->is_read = 1;
		$notif->save();
	}

	public function getNotifications($id){
		return Notification::where('user_id',$id)->orderBy('id','desc')->get();
	}
}