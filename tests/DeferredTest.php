<?php

require_once "vendor/autoload.php";

use Chevron\Containers;


FUnit::test("Deferred::invoke()", function(){

	$R = new Containers\Deferred;
	$R->set("bloop", function(){ return 5; });
	$val = $R->invoke("bloop", array());
	FUnit::equal($val, 5);

});

FUnit::test("Deferred::__call()", function(){

	$R = new Containers\Deferred;
	$R->set("bloop", function(){ return 5; });
	$val = $R->bloop();
	FUnit::equal($val, 5);

});

FUnit::test("Deferred::invoke() w/ arg", function(){

	$R = new Containers\Deferred;
	$R->set("bloop", function($n){ return $n; });
	$in = "This is a test";
	$out = $R->invoke("bloop", array($in));
	FUnit::equal($in, $out);

});

FUnit::test("Deferred::__call() w/ arg", function(){

	$R = new Containers\Deferred;
	$R->set("bloop", function($n){ return $n; });
	$in = "This is a test";
	$out = $R->bloop($in);
	FUnit::equal($in, $out);

});

FUnit::test("Deferred::invoke() w/ multiple args", function(){

	$R = new Containers\Deferred;
	$R->set("bloop", function($a, $b){ return $a + $b; });
	$out = $R->invoke("bloop", array(3, 4));
	FUnit::equal($out, 7);

});

FUnit::test("Deferred::invoke() w/ multiple mixed type args", function(){

	$R = new Containers\Deferred;
	$R->set("bloop", function($a, $b){ return array($a, $b); });
	$out = $R->invoke("bloop", array("one", array("two" => "three")));
	$expected = array("one", array("two" => "three"));
	FUnit::equal($out, $expected);

});

FUnit::test("Deferred::once()", function(){

	$R = new Containers\Deferred;
	$R->set("bloop", function($a, $b){ return $a + $b; });
	$result = $R->once("bloop", array(3, 4));
	FUnit::equal($result, 7, "initial call");
	$result = $R->once("bloop", array(5, 6));
	FUnit::equal($result, 7, "singleton via multiple calls");

});

FUnit::test("Deferred::get()", function(){

	$R = new Containers\Deferred;

	$R->set("bloop", function(){ return md5(mt_rand(1,999)); });
	$R->set("blooper", 9);

	$val1 = $R->get("bloop");
	$val2 = $R->get("bloop", true);
	$val3 = $R->get("bloop");

	FUnit::not_equal($val1, $val2, "lambda");
	FUnit::equal($val1, $val3, "lambda singleton");

	$val = $R->get("blooper");
	FUnit::equal($val, 9, "scalar");

});

FUnit::test("Deferred::raw()", function(){

	$R = new Containers\Deferred;

	$R->set("bloop", function(){ return md5(mt_rand(1,999)); });

	$val1 = $R->raw("bloop");
	$val2 = $R->get("bloop");
	$val3 = $R->raw("bloop");
	$val4 = $R->get("bloop", true);
	$val5 = $R->raw("bloop");

	FUnit::ok(($val1 InstanceOf Closure), "InstanceOf Closure");
	FUnit::ok(ctype_xdigit($val2), "ctype_xdigit");
	FUnit::ok(($val3 InstanceOf Closure), "InstanceOf Closure");
	FUnit::ok(ctype_xdigit($val4), "ctype_xdigit");
	FUnit::ok(($val5 InstanceOf Closure), "InstanceOf Closure");

});