<?php

use Chevron\Containers;

class RegistryTest extends PHPUnit_Framework_TestCase {

	function test___construct_mod_via_reference(){

		$base = array("one" => 1, "two" => 2, "three" => 3);

		$ref = new Containers\Registry($base);

		$ref->set("one", 5);

		$this->assertEquals($base["one"], 5);

	}

	function test___construct_mod_via_array(){

		$base = array("one" => 1, "two" => 2, "three" => 3);

		$ref = new Containers\Registry($base);

		$base["one"] = 5;

		$this->assertEquals($ref->get("one"), 5);

	}

	function test_count_and_set(){

		$R = new Containers\Registry;

		$pre = count($R);

		$R->set("bloop", "bleep");

		$post = count($R);

		$this->assertEquals($pre, 0, "has zero before");
		$this->assertEquals($post, 1, "has non-zero after");

	}

	function test_has(){

		$R = new Containers\Registry;

		$pre = count($R);

		$R->set("bloop", "bleep");

		$has = $R->has("bloop");

		$this->assertEquals($has, true);

	}

	function test_del(){

		$R = new Containers\Registry;

		$pre = count($R);

		$R->set("bloop", "bleep");

		$this->assertEquals($R->get("bloop"), "bleep");
		$R->del("bloop");
		$this->assertEquals($R->get("bloop"), null);

	}

	function test_setMany(){

		$R = new Containers\Registry;

		$pre = count($R);

		$R->setMany(array(
			"bloop" => "bleep",
			"blop" => "blep",
			"blope" => "blepe",
		));

		$post = count($R);

		$this->assertEquals($pre, 0, "has zero before");
		$this->assertEquals($post, 3, "has non-zero after");

	}

	function test_get(){

		$R = new Containers\Registry;

		$key = "bloop";
		$value = "bleep";

		$R->set($key, $value);

		$return = $R->get($key);

		$this->assertEquals($value, $return);

	}

	function test_getGenerator(){

		$R = new Containers\Registry;

		$values = [
			"bloop" => "bleep",
			"blop"  => "blep",
			"blope" => "blepe",
		];

		$R->setMany($values);

		foreach($R->range() as $key => $value){
			$this->assertArrayHasKey($key, $values);
			$this->assertEquals($value, $values[$key]);
		}

	}
}

