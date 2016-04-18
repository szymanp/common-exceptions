<?php
namespace Szyman\Exception;

class InvalidArgumentTypeException extends \InvalidArgumentException
{
	/**
	 * Creates a new exception indicating that an argument of an invalid type was passed.
	 *
	 * This exception indicates a programming error in the code.
	 *
	 * @param string $argumentName
	 * @param mixed  $actual
	 * @param string $expectedType
	 */
	public function __construct($argumentName, $actual, $expectedType = null)
	{
		$actual = is_object($actual) ? get_class($actual) : gettype($actual);
		if ($argumentName[0] != "$") $argumentName = '$' . $argumentName;

		parent::__construct($argumentName . " has an invalid type <$actual>."
			. (is_null($expectedType) ? "" : " Expecting <$expectedType>"));
	}
}
