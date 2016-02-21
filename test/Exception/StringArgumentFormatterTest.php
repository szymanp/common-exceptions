<?php
namespace Szyman\Exception;

class StringArgumentFormatterTest extends \PHPUnit_Framework_TestCase
{
	public function testStringsAndNull()
	{
		$this->assertEquals(StringArgumentFormatter::format("Found %1 results in location %2", ["no", null]),
							"Found no results in location <NULL>");
	}
}
