<?php namespace Bagito\Storage;

interface QuotationRepository
{
	/**
	Status:
	0 = OnGoing (On going quotation)
	1 = Active (Finished Quotation)
	-1 = Rejected (Redo Quotation)
	2 = Approved (Done, for monitoring)


	**/
	public function find($id);

	public function getAllActive();

	public function getAllOnGoing();

	public function getAllApproved();

	public function getAllQuotation($projectid); 

	public function create($userId,$projectId,$inputs);

	public function delete($id);

	public function update($id, $inputs);

	public function changeStatus($id, $status);

	public function getAllEntries($id);

	public function getActive($projectId);

	public function getAllQuotationByUser($userId);

	public function tagAsForApproval($id);

	public function verifyQuotation($userId, $quotationId);

	public function getOtherQuotation($id);

	public function addExpenses($id, $inputs);

	public function getExpensesById($id);

	public function removeExpenses($id);

}