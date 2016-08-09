<?php

use Chevron\Containers;

class SetTest extends PHPUnit_Framework_TestCase {

	function test_set(){

		$R = new Containers\Stack;

		$R->push(2);
		$R->push(4);
		$R->push(6);
		$R->push(8);

		$this->assertEquals($R->pop(), 8);
		$this->assertEquals(count($R), 3);

		$this->assertEquals($R->peek(), 6);
		$this->assertEquals(count($R), 3);

		$this->assertEquals($R->peek(2), 4);
		$this->assertEquals(count($R), 3);

		$this->assertEquals($R->peek(4), null);

	}
}
