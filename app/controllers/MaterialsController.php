<?php

use Bagito\Storage\QuotationRepository as Quotation;
use Bagito\Storage\BudgetRepository as Budget;
use Bagito\Storage\UserRepository as User;
use Bagito\Storage\NotificationRepository as Notification;
use Bagito\Storage\SupplierRepository as Supplier;
use Bagito\Storage\OtherExpensesRepository as OtherExpenses;
use Bagito\Storage\EntryRepository as Entry;
use Bagito\Storage\ValueRepository as Value;


class MaterialsController extends BaseController{

	public function __construct(Quotation $quotation, Budget $budget, User $user, Notification $notification, Supplier $supplier, OtherExpenses $otherExpenses, Entry $entry, Value $value){
		$this->quotation = $quotation;
		$this->budget = $budget;
		$this->user = $user;
		$this->notification = $notification;
		$this->supplier = $supplier;
		$this->expenses = $otherExpenses;
		$this->entry = $entry;
		$this->value = $value;
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
		$suppliers = $this->supplier->lists();
		$childd = $this->entry->getChildList();
		$materials = $this->value->getAllMaterialsFrom($id);
		$summer = 0;
		foreach($materials as $material){
			$summer += $material->quantity * $material->amount;
		}
		$sumValue = $this->value->getSumOfQuotation($id);
		
		return View::make('secretary.materials.show',compact('id','expenses','quotation','entries','cont','childd','suppliers','sumValue','summer','materials'));
	}

	public function store($quotationId){
		/*$entryId = Input::get('entry_id');
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
		}*/
	}

	public function delete($id){
		$this->budget->delete($id);
		return Redirect::back();
	}

	public function storeRer($id){

		$supplier = Input::get('supplier_id');
		$amount = Input::get('amount');
		$quantity = Input::get('quantity');
		$remarks = Input::get('remarks');
		$entry = Input::get('entry_id');

		for($index = 0; $index < count(Input::get('supplier_id')); ++$index){
			$fields['supplier' . $index] = $supplier[$index];
			$fields['entry' . $index] = $entry[$index];
			$fields['amount' . $index] = $amount[$index];
			$fields['quantity' . $index] = $amount[$index];

			$rules['supplier' . $index] = 'required';
			$rules['entry'. $index] = 'required';
			$rules['amount'. $index] = 'required|numeric';
			$rules['quantity' . $index] = 'required|numeric';
		}

		$validator = Validator::make($fields,$rules);
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}else{
			$rand = substr(md5(microtime()),rand(0,26),15);
			$status = $this->uploadFiles($rand,'receipt');

			if($status){

				$users = $this->user->getAllAdmins();
				$quotation = $this->quotation->find($id);
						

				for($index = 0; $index < count($supplier); ++$index){
					$material = new Material;
					$material->quotation_id = $id;
					$material->supplier_id = $supplier;
					$material->amount = $amount[$index];
					$material->quantity = $quantity[$index];
					$material->remarks = $remarks;
					$material->entry_id = $entry[$index];
					$material->filename = $rand . Input::file('receipt')->getClientOriginalExtension();
					$material->save();
					$inValue = $this->value->getValue($id, $material->entry_id);

					$entryAmount = $material->quantity * $material->amount;
					$expectedAmount = $inValue->dc;

					if($expectedAmount < $entryAmount){
						$entry = $this->entry->find($material->entry_id);
						foreach($users as $user){
							$this->notification->create($user->id,'Item :' . $entry->description . ' of Quotation ' . $quotation->title . ' of Project ' . $quotation->project()->first()->title . ' has exceeded it\'s alloted amount');
						}
					}
					$materials = $this->value->getAllMaterialsFrom($id);
					$summer = 0;
					foreach($materials as $material){
						$summer += $material->quantity * $material->amount;
					}
					$sumValue = $this->value->getSumOfQuotation($id);

					if($sumValue < $summer){
						foreach($users as $user){
							$this->notification->create($user->id,'Alert! Quotation ' . $quotation->title .' of Project ' . $quotation->project()->first()->title . ' has exceeded the allocated budget');
						}
						
					}else if($sumValue / $summer * 100 >= 70){
						$this->notification->create($user->id,'Alert! Quotation ' . $quotation->title .' of Project ' . $quotation->project()->first()->title . ' is beyond the 70% critical limit');
					}
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

    public function adminShow($id){
 		$quotation = $this->quotation->find($id);
		$expenses = $this->expenses->all();
		$entries = $this->entry->getParents();
		$cont = $quotation->cont;
		$suppliers = $this->supplier->lists();
		$childd = $this->entry->getChildList();
		$materials = $this->value->getAllMaterialsFrom($id);
		$summer = 0;
		foreach($materials as $material){
			$summer += $material->quantity * $material->amount;
		}
		$sumValue = $this->value->getSumOfQuotation($id);
		
		return View::make('admin.materials.show',compact('id','expenses','quotation','entries','cont','childd','suppliers','sumValue','summer','materials'));   	
    }
    public function admin(){
 		$loadss = $this->quotation->allQuotationLoad();
		return View::make('admin.materials.index',compact('loadss'));   	
    }
}