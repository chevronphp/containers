<?php

use Chevron\Containers;

class SetTest extends PHPUnit_Framework_TestCase {

	function test_set(){

		$R = new Containers\Set;

		$R->lpush(4);
		$R->lpush(2);
		$R->rpush(6);
		$R->rpush(8);

		$this->assertEquals($R->lpop(), 2);
		$this->assertEquals($R->rpop(), 8);
		$this->assertEquals(count($R), 2);

	}


	function test_range(){

		$R = new Containers\Set;

		$R->lpush(4);
		$R->lpush(2);
		$R->rpush(6);
		$R->rpush(8);

		$base = 2;
		foreach($R->range() as $v){
			$this->assertEquals($v, $base);
			$base += 2;
		}

		$base = 2;
		$iter = $R->getIterator();
		foreach($iter as $v){
			$this->assertEquals($v, $base);
			$base += 2;
		}

		$base = 8;
		foreach($R->range(1) as $v){
			$this->assertEquals($v, $base);
			$base -= 2;
		}

	}

}