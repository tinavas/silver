<?php
use Bagito\Storage\EntryRepository as Entry;
use Bagito\Storage\QuotationRepository as Quotation;
class EntryController extends BaseController
{
	public function __construct(Entry $entry, Quotation $quotation)
	{
		$this->entry = $entry;
		$this->quotation = $quotation;
	}

	public function addOtherExpenses($id){
		$rules = [
					'cost' => 'required|numeric',
					'description' => 'required'
				 ];

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$this->quotation->addExpenses($id, Input::all());
			Session::flash('message','Expenses Added');
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
		$parentsArray = $this->entry->getParents($id);
		$subsArray = $this->entry->getSubHeaders($id);
		$expenses = $this->quotation->getExpensesById($id);
		$grandTotal = $this->entry->getSum($id);
		$totalExpenses = $this->entry->getExpensesSum($id);

		$divisor = $grandTotal + ($grandTotal * 0.03);
		$divisor += $totalExpenses;
		$divisor += $divisor * 0.15;
		$divisor += $divisor * 0.1;
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
		return View::make('architect.entry.create',compact('parents','id','subs','expenses','quotation','grandTotal','totalExpenses','divisor'))->with('entries',$parentsArray);
	}
	public function store($id){
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
					 	'quantity'=> 'required|numeric',
					 	'um' => 'numeric',
					 	'ul' => 'numeric'
					 ];
		}

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$this->entry->store($id, Input::all());
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

		$parentsArray = $this->entry->getParents($id);
		$subsArray = $this->entry->getSubHeaders($id);
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
		return View::make('architect.approve.show',compact('parents','id','subs'))->with('entries',$parentsArray);
	}

	public function showPrinterFriendly($id){
		$quotation = $this->quotation->find($id);
		$project = $quotation->project()->first();
		$parentsArray = $this->entry->getParents($id);
		$subsArray = $this->entry->getSubHeaders($id);
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
		$entries = $parentsArray;
		$fpdf = new Fpdf();
        $fpdf->AddPage();
        $fpdf->SetFont('Helvetica','B',18);
        $fpdf->Cell(40,10,'Silver Leisure');
        $fpdf->Ln();
        $fpdf->SetFont('Helvetica','',9);
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
        $fpdf->Cell(30,5,'Author: ' . $quotation->user()->first()->first_name . ' ' . $quotation->user()->first()->last_name);
        $fpdf->Ln();
        $fpdf->Cell(30,5,'Quotation Code: ' . str_pad($quotation->project()->first()->id, 3, "0", STR_PAD_LEFT) . '-'. str_pad($quotation->quotation_code, 3, "0", STR_PAD_LEFT));
        $fpdf->Ln();
        $fpdf->Ln();
        $superTotal = 0 ;
        $fpdf->Cell(50,5,'Description',1,0,'C');
        $fpdf->Cell(20,5,'Quantity',1,0,'C');
        $fpdf->Cell(20,5,'Unit',1,0,'C');
        $fpdf->Cell(50,5,'Price',1,0,'C');
        $fpdf->Cell(50,5,'Total Price',1,0,'C');
        $fpdf->Ln();
        foreach($entries as $entry){
        	$fpdf->SetFont('Helvetica','B',14);
        	$fpdf->Cell(0,10,$entry->description,1,0,'L');
        	$fpdf->ln();
        	$parentSum = 0;
        	foreach($entry->child() as $subHeader){
        		 foreach($subHeader->entry() as $child){
        		 	$subHeaderSum = 0;
        		 	$fpdf->SetFont('Helvetica','B',10);
        		 	$fpdf->Cell(0,10,$child->description,1,0,'L');
        		 	$fpdf->ln();
        		 	foreach($child->child() as $childEntry){
        		 		foreach($childEntry->entry() as $last){
        		 			$fpdf->SetFont('Helvetica','',10);
        		 			$fpdf->Cell(50,5,$last->description,1,0,'C');
                            $fpdf->Cell(20,5,$last->quantity,1,0,'C');
                            $fpdf->Cell(20,5,$last->unit,1,0,'C');
                            $fpdf->Cell(50,5,number_format($last->price,2),1,0,'C');
                            $fpdf->Cell(50,5,number_format($last->quantity * $last->price,2),1,0,'C');
                            $fpdf->Ln();
                            $subHeaderSum +=  ($last->quantity * $last->price);
        		 		}
        		 	}
        		 	$fpdf->SetFont('Helvetica','B',10);
        		 	$parentSum += $subHeaderSum;
        		 	$fpdf->Cell(0,10,$child->description . ' : ' . number_format($subHeaderSum,2),1,0,'L');
        		 	$fpdf->Ln();
        		 }
        	}
        	$fpdf->SetFont('Helvetica','B',14);
        	$fpdf->Cell(0,10, $entry->description . ' : ' . number_format($parentSum,2),1,0,'R');
        	$fpdf->Ln();
        	$superTotal += $parentSum;
        }
        $fpdf->Cell(0,10,'Total: P' . number_format($superTotal,2));
        $fpdf->Output();
        exit;

	}
}