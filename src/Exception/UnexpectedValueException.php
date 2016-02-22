<?php
namespace Szyman\Exception;

class UnexpectedValueException extends \UnexpectedValueException
{
    /**
     * Creates a new exception indicating that a return value from a method call was invalid.
     *
     * @param mixed  $classOrObject Class or object involved.
     * @param string $method        Method that was called.
     * @param mixed  $actual        Actual value returned.
     * @param string $reason        Explanation why the value is invalid.
     * @returns UnexpectedValueException
     */
    public static function newInvalidReturnValue($classOrObject, $method, $actual, $reason = NULL)
    {
		$actual = StringArgumentFormatter::valueToString($actual);

        if (is_object($classOrObject))
        {
            $callee = get_class($classOrObject) . "::" . $method . "()";
        }
        else
        {
            $callee = $classOrObject . "::" . $method . "()";
        }

        return new self($callee . " returned an invalid value: $actual." . (is_null($reason) ? "" : " " . $reason));
    }
}