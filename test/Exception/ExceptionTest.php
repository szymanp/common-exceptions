<?php
namespace Szyman\Exception;


class ExceptionTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException 			Szyman\Exception\Exception
	 * @expectedExceptionMessage	Something happened.
	 * @expectedExceptionCode		404
	 */
	public function testErrorCode()
	{
		throw new Exception("Something happened.", new ErrorCode(404));
	}

	/**
	 * @expectedException 			Szyman\Exception\Exception
	 * @expectedExceptionMessage	Something bad happened.
	 */
	public function testMessage()
	{
		throw new Exception("Something %1 happened.", "bad");
	}
}
