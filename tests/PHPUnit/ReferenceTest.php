<?php

use Chevron\Containers;

class ReferenceTest extends PHPUnit_Framework_TestCase {

	function test___construct_mod_via_reference(){

		$base = array("one" => 1, "two" => 2, "three" => 3);

		$ref = new Containers\Reference($base);

		$ref->set("one", 5);

		$this->assertEquals($base["one"], 5);

	}

	function test___construct_mod_via_array(){

		$base = array("one" => 1, "two" => 2, "three" => 3);

		$ref = new Containers\Reference($base);

		$base["one"] = 5;

		$this->assertEquals($ref->get("one"), 5);

	}
}