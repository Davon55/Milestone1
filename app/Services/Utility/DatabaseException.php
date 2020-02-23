<?php
namespace app\Services\Utility;

use Exception;

class DatabaseException extends Exception
{
	// Non Default constuctor 
	public function __construct($message, $code = 0, Exception $previous = null)
	{
		//Call super class
		parent:: __construct($message, $code, $previous);
	}
}