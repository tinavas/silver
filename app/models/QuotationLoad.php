<?php 

class QuotationLoad extends Eloquent{

	protected $table = "quotations_load";

	public function project() {
		return $this->belongsTo('Project');
	}

	public function quotation() {
		return $this->belongsTo('Quotation');
	}
}