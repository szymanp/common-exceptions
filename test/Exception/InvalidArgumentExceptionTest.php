<?php
namespace Szyman\Exception;


class InvalidArgumentExceptionTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException 			Szyman\Exception\InvalidArgumentTypeException
	 * @expectedExceptionMessage	$userName has an invalid type <integer>. Expecting <string>
	 */
	public function testInvalidType()
	{
		$actual = 243;

		throw new InvalidArgumentTypeException("userName", $actual, "string");
	}

	/**
	 * @expectedException 			Szyman\Exception\InvalidArgumentValueException
	 * @expectedExceptionMessage	$age has an invalid value: -1. Reason: Must be greater than zero
	 */
	public function testInvalidValue()
	{
		$actual = -1;

		throw new InvalidArgumentValueException("age", $actual, "Must be greater than zero");
	}
}
