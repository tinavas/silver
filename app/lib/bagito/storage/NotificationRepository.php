<?php namespace Bagito\Storage;

interface NotificationRepository {

	public function create($id,$inputs);

	public function updateRead($notificationId);

}