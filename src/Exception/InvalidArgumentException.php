<?php
namespace Szyman\Exception;

class InvalidArgumentException extends \InvalidArgumentException
{
	/**
	 * Creates a new exception indicating that an argument of an invalid type was passed.
	 * @param string $argumentName
	 * @param mixed  $actual
	 * @param string $expectedType
	 * @return InvalidArgumentException
	 */
	public static function newInvalidType($argumentName, $actual, $expectedType = null)
	{
		$actual = is_object($actual) ? get_class($actual) : gettype($actual);

		return new self('$' . $argumentName . " has an invalid type <$actual>."
			. (is_null($expectedType) ? "" : " Expecting <$expectedType>"));
	}

	/**
	 * Creates a new exception indicating that an argument with an invalid value was passed.
	 * This exception should be used when the type of the argument is correct, but the value within the type is not.
	 *
	 * @param string $argumentName
	 * @param mixed  $actual
	 * @param string $reason
	 * @return InvalidArgumentException
	 */
	public static function newInvalidValue($argumentName, $actual, $reason = null)
	{
		$actual = StringArgumentFormatter::valueToString($actual);

		return new self('$' . $argumentName . " has an invalid value: $actual"
			. (is_null($reason) ? "" : ". Reason: " . $reason));
	}

}