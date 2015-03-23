<?php

use Bagito\Storage\QuotationRepository as Quotation;

class MaterialsController extends BaseController{

	public function __construct(Quotation $quotation){
		$this->quotation = $quotation;
	}

	public function index(){
		$records = $this->quotation->allQuotationLoad();

		return var_dump($records);
	}
}