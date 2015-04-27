<?php

use Bagito\Storage\QuotationRepository as Quotation;
use Bagito\Storage\BudgetRepository as Budget;
use Bagito\Storage\UserRepository as User;
use Bagito\Storage\NotificationRepository as Notification;
use Bagito\Storage\SupplierRepository as Supplier;
use Bagito\Storage\OtherExpensesRepository as OtherExpenses;
use Bagito\Storage\EntryRepository as Entry;


class MaterialsController extends BaseController{

	public function __construct(Quotation $quotation, Budget $budget, User $user, Notification $notification, Supplier $supplier, OtherExpenses $otherExpenses, Entry $entry){
		$this->quotation = $quotation;
		$this->budget = $budget;
		$this->user = $user;
		$this->notification = $notification;
		$this->supplier = $supplier;
		$this->expenses = $otherExpenses;
		$this->entry = $entry;
	}

	public function index(){
		$loadss = $this->quotation->allQuotationLoad();
		return View::make('secretary.materials.index',compact('loadss'));
	}

	public function show($id){
		$quotation = $this->quotation->find($id);
		$expenses = $this->expenses->all();
		$entries = $this->entry->getParents();
		$cont = $quotation->cont;
		
		return View::make('secretary.materials.show',compact('id','expenses','quotation','entries','cont'));
	}

	public function store($quotationId){
		$entryId = Input::get('entry_id');
		$rules = ['quantity' => 'required|numeric','unit_price' => 'required|numeric','entry_id' => 'required','supplier_id' => 'required'];
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$budget = $this->budget->add($quotationId, $entryId, Input::all());
			$totalTm = $this->budget->getTotalMaterialsByQuotationId($quotationId);
			$totalAmount = $this->budget->getSumOfBudgetByQuotationId($quotationId);
			$entryQuantity = $budget->entry()->first()->quantity;
			$quantity = $this->budget->getEntryTotalQuantity($quotationId,$budget->entry_id);
			if($quantity > $entryQuantity){
				$users = $this->user->getAllAdmins();
				$quotation = $this->quotation->find($quotationId);
				foreach($users as $user){
					$this->notification->create($user->id,'Alert! Quantity for ' . $budget->entry()->first()->description  . ' on Qoutation' . $quotation->title . ' has exceeded');
				}
			}
			if($totalAmount >= $totalTm){
				$users = $this->user->getAllAdmins();
				$quotation = $this->quotation->find($quotationId);
				foreach($users as $user){
					$this->notification->create($user->id,'Alert! Allocated Budget for Quotation: ' . $quotation->title . ' Has Exceeded the Total Amount of Materials on Quotation');
				}	
			}else if($totalAmount / $totalTm * 100 >= 70){
				$users = $this->user->getAllAdmins();
				$quotation = $this->quotation->find($id);
				foreach($users as $user){
					$this->notification->create($user->id,'Alert! Allocated Budget for Quotation: ' . $quotation->title . ' Has Exceeded the 70% Level');
				}	
			}
			return Redirect::back();
		}
	}

	public function delete($id){
		$this->budget->delete($id);
		return Redirect::back();
	}
}