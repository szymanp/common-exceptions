<?php
namespace Szyman\Exception;


class InvalidArgumentExceptionTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException 			Szyman\Exception\InvalidArgumentException
	 * @expectedExceptionMessage	$userName has an invalid type <integer>. Expecting <string>
	 */
	public function testInvalidType()
	{
		$actual = 243;

		throw InvalidArgumentException::newInvalidType("userName", $actual, "string");
	}

	/**
	 * @expectedException 			Szyman\Exception\InvalidArgumentException
	 * @expectedExceptionMessage	$age has an invalid value: -1. Reason: Must be greater than zero
	 */
	public function testInvalidValue()
	{
		$actual = -1;

		throw InvalidArgumentException::newInvalidValue("age", $actual, "Must be greater than zero");
	}
}
