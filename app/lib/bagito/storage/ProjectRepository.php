<?php namespace Bagito\Storage;

interface ProjectRepository{
	public function find($id);

	public function all();

	public function create($inputs);

	public function update($id, $inputs);

	public function paginate($number);

	public function search($keyword,$pages);

	public function getNumberOfSubscribers($id);

	public function getSubscribers($projectId);

	public function getNonSubscribers($projectId);

	public function addUser($userId, $projectId);

	public function removeUser($userId, $projectId);

	public function inProject($userId, $projectId);

	public function getQuotations($projectId);

	public function getForApprovalQuotations($projectId);

	/*public function changeStatus($id, $status);*/

	public function addActiveQuotation($projectId, $quotationId);

	public function getApprovedQuotationByProject($projectId);

	public function findQuotationLoad($id);

	public function deleteQuotationLoad($id);

}