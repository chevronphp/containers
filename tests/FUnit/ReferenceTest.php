<?php

require_once "vendor/autoload.php";

use Chevron\Containers;

FUnit::test("Reference::__construct() modified via Reference", function(){

	$base = array("one" => 1, "two" => 2, "three" => 3);

	$ref = new Containers\Reference($base);

	$ref->set("one", 5);

	FUnit::equal($base["one"], 5);

});

FUnit::test("Reference::__construct() modified via array", function(){

	$base = array("one" => 1, "two" => 2, "three" => 3);

	$ref = new Containers\Reference($base);

	$base["one"] = 5;

	FUnit::equal($ref->get("one"), 5);

});