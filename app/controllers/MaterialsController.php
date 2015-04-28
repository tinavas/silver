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
		return View::make('admin.materials.index',compact('loadss'));
	}

	public function show($id){
		$quotation = $this->quotation->find($id);
		$expenses = $this->expenses->all();
		$entries = $this->entry->getParents();
		$cont = $quotation->cont;
		$suppliers = $this->supplier->lists();
		
		$childd = $this->entry->getChildList();
		return View::make('admin.materials.show',compact('id','expenses','quotation','entries','cont','suppliers','childd'));
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

	public function storeRer($id){

		$rules = [
			'amount'		=> 'required|numeric',
			'quantity'		=> 'required|numeric',
			'supplier_id'	=> 'required',
			'entry_id' 		=> 'required'
		];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}else{
			$rand = substr(md5(microtime()),rand(0,26),8);
			$status = $this->uploadFiles($rand,'receipt');

			if($status){
				$supplier = Input::get('supplier_id');
				$amount = Input::get('amount');
				$quantity = Input::get('quantity');
				$remarks = Input::get('remarks');
				$entry = Input::get('entry_id');


				for($index = 0; $index < count($supplier); ++$index){
					$material = new Material;
					$material->quotation_id = $id;
					$material->supplier_id = $supplier;
					$material->amount = $amount[$index];
					$material->quantity = $quantity[$index];
					$material->remarks = $remarks;
					$material->entry_id = $entry[$index];
					$material->filename = $rand;
					$material->save();
				}
			}
		}
		Session::flash('message','Entries Uploaded');
		return Redirect::back();
	}

	public function uploadFiles($filename,$name){     
        if(Input::hasFile($name)){
        	$location = public_path() . '/uploads/';
            $filename .= '.'.Input::file($name)->getClientOriginalExtension();
            if(Input::file($name)->move($location, $filename))
                return $filename;
            return false;
        }
        return false;
    }
}