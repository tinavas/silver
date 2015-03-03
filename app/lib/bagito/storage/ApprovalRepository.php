<?php namespace Bagito\Storage;

interface ApprovalRepository 
{
	public function approve($userId, $quotationId);
	public function disapprove($userId, $quotationId);
}