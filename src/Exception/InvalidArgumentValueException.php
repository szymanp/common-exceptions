<?php
namespace Szyman\Exception;

class InvalidArgumentValueException extends \DomainException
{
	/**
	 * Creates a new exception indicating that an argument with an invalid value was passed.
	 * This exception should be used when the type of the argument is correct, but the value within the type is not.
	 *
	 * This exception indicates a programming error in the code.
	 *
	 * @param string $argumentName
	 * @param mixed  $actual
	 * @param string $reason
	 */
	public function __construct($argumentName, $actual, $reason = null)
	{
		$actual = StringArgumentFormatter::valueToString($actual);
		if ($argumentName[0] != "$") $argumentName = '$' . $argumentName;

		parent::__construct($argumentName . " has an invalid value: $actual"
			. (is_null($reason) ? "" : ". Reason: " . $reason));
	}
}