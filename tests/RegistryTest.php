<?php

require_once "vendor/autoload.php";

use Chevron\Containers;


FUnit::test("Registry::length() && Registry::set()", function(){

	$R = new Containers\Registry;

	$pre = $R->length();

	$R->set("bloop", "bleep");

	$post = $R->length();

	FUnit::equal($pre, 0, "has zero before");
	FUnit::equal($post, 1, "has non-zero after");

});

FUnit::test("Registry::has()", function(){

	$R = new Containers\Registry;

	$pre = $R->length();

	$R->set("bloop", "bleep");

	$has = $R->has("bloop");

	FUnit::equal($has, true);

});

FUnit::test("Registry::setMany()", function(){

	$R = new Containers\Registry;

	$pre = $R->length();

	$R->setMany(array(
		"bloop" => "bleep",
		"blop" => "blep",
		"blope" => "blepe",
	));

	$post = $R->length();

	FUnit::equal($pre, 0, "has zero before");
	FUnit::equal($post, 3, "has non-zero after");

});

FUnit::test("Registry::get() return value", function(){

	$R = new Containers\Registry;

	$key = "bloop";
	$value = "bleep";

	$R->set($key, $value);

	$return = $R->get($key);

	FUnit::equal($value, $return);

});

FUnit::test("Registry::getIterator() returns ArrayIterator", function(){

	$R = new Containers\Registry;

	$R->setMany(array(
		"bloop" => "bleep",
		"blop" => "blep",
		"blope" => "blepe",
	));

	$iter = $R->getIterator();

	$isType = $iter InstanceOf \ArrayIterator;

	FUnit::equal($isType, true);

	foreach($iter as $key => $value){
		if(!$R->has($key)){
			FUnit::fail("property not found in iteration");
		}
	}

});

