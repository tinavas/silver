<?php namespace Bagito\Utilities;

use Exception;

class BagitoException extends Exception
{
	protected $priorException;
 
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        $this->priorException = $previous;
         
        parent::__construct($message, $code);
    }
     
    public function getPrior()
    {
        return $this->priorException;
    }
}