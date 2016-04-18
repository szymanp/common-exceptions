<?php
namespace Szyman\Exception;

class InvalidArgumentException extends \InvalidArgumentException
{
	/**
	 * Creates a new exception indicating that an argument of an invalid type was passed.
	 *
	 * This exception indicates a programming error in the code.
	 *
	 * @param string $argumentName
	 * @param mixed  $actual
	 * @param string $expectedType
	 * @return InvalidArgumentException
	 */
	public static function newInvalidType($argumentName, $actual, $expectedType = null)
	{
		$actual = is_object($actual) ? get_class($actual) : gettype($actual);
		if ($argumentName[0] != "$") $argumentName = '$' . $argumentName;

		return new self($argumentName . " has an invalid type <$actual>."
			. (is_null($expectedType) ? "" : " Expecting <$expectedType>"));
	}

	/**
	 * Creates a new exception indicating that an argument with an invalid value was passed.
	 * This exception should be used when the type of the argument is correct, but the value within the type is not.
	 *
	 * This exception indicates a programming error in the code.
	 *
	 * @param string $argumentName
	 * @param mixed  $actual
	 * @param string $reason
	 * @return \DomainException
	 */
	public static function newInvalidValue($argumentName, $actual, $reason = null)
	{
		$actual = StringArgumentFormatter::valueToString($actual);
		if ($argumentName[0] != "$") $argumentName = '$' . $argumentName;

		return new \DomainException( $argumentName . " has an invalid value: $actual"
			. (is_null($reason) ? "" : ". Reason: " . $reason));
	}
}
