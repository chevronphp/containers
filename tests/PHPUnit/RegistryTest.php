<?php

use Chevron\Containers;

class RegistryTest extends PHPUnit_Framework_TestCase {

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

	function test_getIterator(){

		$R = new Containers\Registry;

		$R->setMany(array(
			"bloop" => "bleep",
			"blop" => "blep",
			"blope" => "blepe",
		));

		$iter = $R->getIterator();

		$isType = $iter InstanceOf \ArrayIterator;

		$this->assertEquals($isType, true);

		foreach($iter as $key => $value){
			if(!$R->has($key)){
				$this->fail("property not found in iteration");
			}
		}

	}

	function test_getGenerator(){

		$R = new Containers\Registry;

		$values = [
			"bloop" => "bleep",
			"blop"  => "blep",
			"blope" => "blepe",
		];

		$R->setMany($values);

		foreach($R->iter() as $key => $value){
			$this->assertArrayHasKey($key, $values);
			$this->assertEquals($value, $values[$key]);
		}

	}
}

