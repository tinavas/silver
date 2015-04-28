<?php namespace Bagito\Auth;

interface AuthFilterRepository {

	public function architect();

	public function secretary();

	public function admin();
}