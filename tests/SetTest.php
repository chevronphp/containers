<?php

require_once "vendor/autoload.php";

use Chevron\Containers;


FUnit::test("Set", function(){

	$R = new Containers\Set;

	$R->lpush(4);
	$R->lpush(2);
	$R->rpush(6);
	$R->rpush(8);

	FUnit::equal($R->lpop(), 2);
	FUnit::equal($R->rpop(), 8);
	FUnit::equal(count($R), 2);

});


FUnit::test("Set::range()", function(){

	$R = new Containers\Set;

	$R->lpush(4);
	$R->lpush(2);
	$R->rpush(6);
	$R->rpush(8);

	$base = 2;
	foreach($R->range() as $v){
		FUnit::equal($v, $base);
		$base += 2;
	}

	$base = 2;
	$iter = $R->getIterator();
	foreach($iter as $v){
		FUnit::equal($v, $base);
		$base += 2;
	}

	$base = 8;
	foreach($R->range(1) as $v){
		FUnit::equal($v, $base);
		$base -= 2;
	}

});

