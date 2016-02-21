<?php
namespace Szyman\Exception;

/**
 * A class for supplying error codes to the Exception class.
 */
class ErrorCode
{
	protected $code;
	
	public function __construct($code)
	{
		$this->code = $code;
	}
	
	public function getCode()
	{
		return $this->code;
	}
}