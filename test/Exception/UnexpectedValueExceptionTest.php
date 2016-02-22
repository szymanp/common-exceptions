<?php
namespace Szyman\Exception;

class UnexpectedValueExceptionTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException 			Szyman\Exception\UnexpectedValueException
	 * @expectedExceptionMessage	Szyman\Exception\UnexpectedValueExceptionTest::myMethod() returned an invalid value: [1,2,3]. Value should be a string
	 */
	public function testInvalidReturnValue()
	{
		$actual = array(1, 2, 3);

		throw UnexpectedValueException::newInvalidReturnValue($this, "myMethod", $actual, "Value should be a string");
	}
}
