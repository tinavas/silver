<?php
use Bagito\Storage\EntryRepository as Entry;
use Bagito\Storage\QuotationRepository as Quotation;
use Bagito\Storage\OtherExpensesRepository as OtherExpenses;

class EntryController extends BaseController
{
	public function __construct(Entry $entry, Quotation $quotation, OtherExpenses $otherExpenses)
	{
		$this->entry = $entry;
		$this->quotation = $quotation;
		$this->expenses = $otherExpenses;
	}

	public function addOtherExpenses(){
		$rules = [
					'description' => 'required'
				 ];

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$this->quotation->addExpenses(Input::all());
			Session::flash('message','Expense Added');
			return Redirect::back();
		}
	}
	public function removeExpenses($id){
		$this->quotation->removeExpenses($id);
		Session::flash('message','Record Removed');
		return Redirect::back();
	}
	public function create($id){
		$quotation = $this->quotation->find($id);
		$expenses = $this->expenses->all();
		$entries = $this->entry->getParents();
		$cont = $quotation->cont;
		
		return View::make('architect.entry.create',compact('id','expenses','quotation','entries','cont'));
	}
	public function store(){
		$rules = array();
		$option = Input::get('type');
		if($option == 1){
			$rules = [
						'description' => 'required',
						'type' => 'required'
					 ];
		}else if($option == 2){
			$rules = [
						'description' => 'required',
						'type' => 'required',
						'parent_id_sub' => 'required'
						];
		}else{
			$rules = [
					 	'description' => 'required', 
					 	'type' => 'required',
					 	'parent_id' => 'required',
					 ];
		}

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$this->entry->store(Input::all());
			Session::flash('message','Entry Added');
			return Redirect::back();
		}
	}
	public function remove($id)
	{
		$this->entry->remove($id);
		return Redirect::back();
	}

	public function show($id)
	{

		$quotation = $this->quotation->find($id);
		$expenses = $this->expenses->all();
		$entries = $this->entry->getParents();
		$cont = $quotation->cont;
		
		return View::make('architect.approve.show',compact('id','expenses','quotation','entries','cont'));
		//return View::make('architect.approve.show',compact('parents','id','subs','expenses','quotation','grandTotal','totalExpenses','divisor'))->with('entries',$parentsArray);
	}

	public function showPrinterFriendly($id){
		$quotation = $this->quotation->find($id);
		$expenses = $this->expenses->all();
		$dcSum = $this->entry->getSum($id);

		$expensesSum = $this->entry->getExpensesSum($id);
		$netSum = ($dcSum * $quotation->cont);
		$netSum += $expensesSum;
		$netSum += ($netSum * .10);
		$entries = $this->entry->getParents();
		$cont = $quotation->cont;
		$project = $quotation->project()->first();
		$view =  View::make('architect.approve.print',compact('id','expenses','quotation','entries','cont','project','dcSum','netSum'))->render();
		$pdf = PDF::loadHTML($view)->setPaper('a4')->setOrientation('landscape');
		return $pdf->stream('quotation.pdf');
	}

	public function getAllSubHeaders(){
		$id = Input::get('id');
		return Response::json($this->entry->getSubs($id));
	}

	public function showEntryTemplateEditor(){
		$headers = $this->entry->getParents();
		$expenses = $this->quotation->getExpenses();
		$parents = $this->entry->getParentList();
		return View::make('architect.entry.entryeditor',compact('headers','parents','expenses'));
	}

	public function saveTemplateEntry(){
		$some = Input::get('id');
		$value = Input::get('value');
		$type = explode("-",$some);
		//call repository for saving

		$this->entry->update($type[0], $type[1], $value);

		return Response::json(array('status' => 'Success'));
	}

	public function getEntryValues(){
		$id = Input::get('id');
		$entry = $this->entry->getEntryValues($id);
		return Response::json($entry->toArray());
	}
}