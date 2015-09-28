<?php

use Chevron\Containers;

class FilterTest extends PHPUnit_Framework_TestCase {

	protected $input = [
		"one" => true,
		"two" => "this is \x09 A <div>bad</div> STRING",
		"three" => [
			"four" => "this is \x09 another <div>bad</div> string",
			"five" => false,
		],
	];

	function test_getFiltered(){
		$R = new Containers\Filter($this->input);

		$val = $R->getFiltered("one");
		$this->assertEquals($val, true);

		$val = $R->getFiltered("three");
		$this->assertEquals(count($val), 2);

		$val = $R->getFiltered("two", function($v, $k){
			return strtolower(strip_tags($v));
		});
		$this->assertEquals($val, "this is \x09 a bad string");

		$val = $R->getFiltered("two", function($v, $k){
			return strtr($v, "\x09", " ");
		});
		$this->assertEquals($val, "this is   A <div>bad</div> STRING");
	}

	function test_getAllFiltered(){
		$R = new Containers\Filter($this->input);

		$val = $R->getAllFiltered();
		$this->assertEquals(count($val), 3);

		$val = $R->getAllFiltered(function(&$v){
			$v = strtr(strtolower(strip_tags($v)), "\x09", " ");
		});
		$this->assertEquals($val, [
			"one" => true,
			"two" => "this is   a bad string",
			"three" => [
				"four" => "this is   another bad string",
				"five" => false,
			],
		]);

		$this->assertNotEquals($R->getAll(), $val);
	}

}
