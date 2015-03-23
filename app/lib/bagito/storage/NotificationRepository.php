<?php namespace Bagito\Storage;

interface NotificationRepository {

	public function all();

	public function paginate($pages);

	public function create($id,$inputs);

	public function updateRead($notificationId);

}