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
		return View::make('architect.entry.create',compact('id','expenses','quotation','entries'));
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
		$parentsArray = $this->entry->getParents($id);
		$subsArray = $this->entry->getSubHeaders($id);
		$expenses = $this->quotation->getExpensesById($id);
		$grandTotal = $this->entry->getSum($id);

		$totalExpenses = $this->entry->getExpensesSum($id);


		$divisor = $grandTotal + ($grandTotal * $quotation->cont);
		$divisor += $totalExpenses;
		$divisor += $divisor * $quotation->others;
		$divisor += $divisor * $quotation->tax;
		$subs = array();
		$parents = array();
		foreach($parentsArray as $parent)
		{
			$parents[$parent->id] = $parent->description;
		}

		foreach($subsArray as $sub)
		{
			$subs[$sub->id] = $sub->description;
		}
		$parentsArray = $this->entry->getHeaders($id);
		return View::make('architect.approve.show',compact('parents','id','subs','expenses','quotation','grandTotal','totalExpenses','divisor'))->with('entries',$parentsArray);
	}

	public function showPrinterFriendly($id){
		/*$quotation = $this->quotation->find($id);
		$project = $quotation->project()->first();
		$parentsArray = $this->entry->getParents($id);
		$subsArray = $this->entry->getSubHeaders($id);
		$grandTotal = $this->entry->getSum($id);
		$totalExpenses = $this->entry->getExpensesSum($id);
		$subs = array();
		$parents = array();
		$divisor = $grandTotal + ($grandTotal * $quotation->cont);
		$divisor += $totalExpenses;
		$divisor += $divisor * $quotation->others;
		$divisor += $divisor * $quotation->tax;
		$netTotal = 0;
		foreach($parentsArray as $parent)
		{
			$parents[$parent->id] = $parent->description;
		}

		foreach($subsArray as $sub)
		{
			$subs[$sub->id] = $sub->description;
		}
		$parentsArray = $this->entry->getHeaders($id);
		$entries = $parentsArray;
		$fpdf = new Fpdf();
        $fpdf->AddPage('L');
        $fpdf->SetFont('Helvetica','B',12);
        $fpdf->Cell(40,10,'Silver Leisure');
        $fpdf->Ln();
        $fpdf->SetFont('Helvetica','',7);
        $fpdf->Cell(30,5,'2/F Silverado Hardware and Const. Supply, Marcos Highway, Antipolo City.');
        $fpdf->Ln();
        $fpdf->Cell(30,5,'Email: silverleisure@yahoo.com');
        $fpdf->Ln();
        $fpdf->Cell(30,5,'Tel: 681-6745');
        $fpdf->Ln();
        $fpdf->Cell(30,5,'Mobile Number: 0917 808 7923');
        $fpdf->Ln();
        $fpdf->Ln();
        $fpdf->Cell(30,5,'Project Title: ' . $project->title);
        $fpdf->Ln();
        $fpdf->Cell(30,5,'Quotation Title: ' . $quotation->title);
        $fpdf->Ln();
        $fpdf->Cell(30,5,'Author: ' . $quotation->user()->first()->first_name . ' ' . $quotation->user()->first()->last_name);
        $fpdf->Ln();
        $fpdf->Cell(30,5,'Quotation Code: ' . str_pad($quotation->project()->first()->id, 3, "0", STR_PAD_LEFT) . '-'. str_pad($quotation->quotation_code, 3, "0", STR_PAD_LEFT));
        $fpdf->Ln();
        $fpdf->Ln();
        $superTotal = 0 ;
        $fpdf->SetFont('Courier','B',9);
        $fpdf->Cell(162,5,'Description',1,0,'C');
        $fpdf->Cell(20,5,'Quantity',1,0,'C');
        $fpdf->Cell(20,5,'Unit',1,0,'C');
        $fpdf->Cell(25,5,'Material',1,0,'C');
        $fpdf->Cell(25,5,'Labor',1,0,'C');
        $fpdf->Cell(25,5,'Total Price',1,0,'C');
        $fpdf->Ln();
        foreach($entries as $entry){
        	$fpdf->SetFont('Courier','B',14);
        	$fpdf->Cell(0,10,$entry->description,1,0,'L');
        	$fpdf->ln();
        	$parentSum = 0;
        	foreach($entry->child() as $subHeader){
        		 foreach($subHeader->entry() as $child){
        		 	$subHeaderSum = 0;
        		 	$fpdf->SetFont('Courier','I',8);
        		 	$fpdf->Cell(0,10,$child->description,1,0,'L');
        		 	$fpdf->ln();
        		 	foreach($child->child() as $childEntry){
        		 		foreach($childEntry->entry() as $last){
        		 			$um = ($last->um / $grandTotal * $divisor) * $last->quantity;
							$ul = ($last->ul / $grandTotal * $divisor) * $last->quantity;
        		 			$fpdf->SetFont('Courier','',8);
        		 			$fpdf->Cell(162,5,$last->description,1,0,'C');
                            $fpdf->Cell(20,5,$last->quantity,1,0,'L');
                            $fpdf->Cell(20,5,$last->unit,1,0,'L');
                            $fpdf->Cell(25,5,number_format($um,2),1,0,'L');
                            $fpdf->Cell(25,5,number_format($ul,2),1,0,'L');
                            $fpdf->Cell(25,5,number_format($um + $ul,2),1,0,'L');
                            $netTotal += $um + $ul;
                            $fpdf->Ln();
                            $subHeaderSum +=  ($um + $ul);
        		 		}
        		 	}
        		 	$fpdf->SetFont('Courier','I',8);
        		 	$parentSum += $subHeaderSum;
        		 	$fpdf->Cell(0,10,$child->description . ' : ' . number_format($subHeaderSum,2),1,0,'L');
        		 	$fpdf->Ln();
        		 }
        	}
        	$fpdf->SetFont('Courier','B',14);
        	$fpdf->Cell(0,10, $entry->description . ' : ' . number_format($parentSum,2),1,0,'L');
        	$fpdf->Ln();
        	$superTotal += $parentSum;
        }
        $fpdf->Cell(0,10,'Total: P' . number_format($netTotal,2),0,0,'R');
        $fpdf->Output();
        exit;*/

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
}