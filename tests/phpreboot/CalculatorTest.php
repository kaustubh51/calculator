<?php
namespace phpreboot;

use phpreboot\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
	private $calculator;

	public function setup()
	{
		$this->calculator = new calculator();	
	}

	public function tearDown()
	{
		$this->calculator = null;
	}

	public function testAddReturnsAnInteger()
	{
		$result = $this->calculator->add();
		$this->assertInternalType('integer', $result, 'Result of add is not an integer.');
	}
	
	public function testAddWithoutParameterReturnZero()
	{
		$result = $this->calculator->add();
		$this->assertSame(0, $result, 'Empty string on add do not return 0');
	}

	public function testAddWithSingleNumberReturnsSameNumber()
	{
		$result = $this->calculator->add(4);
		$this->assertSame(4, $result, 'Add with single number do not return with same number.');
	}

	public function testAddWithTwoParametersReturnsTheirSum()
	{
		$result = $this->calculator->add('3,4');
		$this->assertSame(7, $result, 'Add with two parameters do not return correct sum.');
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testAddWithNonStringParameterThrowsException()
	{
		$result = $this->calculator->add(5, 'Integer parameter do not throw error.');
	}
}
