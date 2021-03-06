<?php

use Chevron\Containers;

class DeferredTest extends PHPUnit_Framework_TestCase {

	function test_interfaces(){

		$R = new Containers\Deferred;
		$this->assertInstanceOf("\\Chevron\\Containers\\DeferredInterface", $R);
		$this->assertInstanceOf("\\Chevron\\Containers\\DiInterface", $R);

		$R = new Containers\Di;
		$this->assertInstanceOf("\\Chevron\\Containers\\DeferredInterface", $R);
		$this->assertInstanceOf("\\Chevron\\Containers\\DiInterface", $R);

	}

	function test_getNew(){

		$R = new Containers\Deferred;
		$R->set("bloop", function(){ return 5; });
		$val = $R->getNew("bloop", array());
		$this->assertEquals($val, 5);

	}

	function test_getNew_w_args(){

		$R = new Containers\Deferred;
		$R->set("bloop", function($n){ return $n; });
		$in = "This is a test";
		$out = $R->getNew("bloop", array($in));
		$this->assertEquals($in, $out);

	}

	function test_getNew_w_many_args(){

		$R = new Containers\Deferred;
		$R->set("bloop", function($a, $b){ return $a + $b; });
		$out = $R->getNew("bloop", array(3, 4));
		$this->assertEquals($out, 7);

	}

	function test_getNew_w_many_args_mixed_type(){

		$R = new Containers\Deferred;
		$R->set("bloop", function($a, $b){ return array($a, $b); });
		$out = $R->getNew("bloop", array("one", array("two" => "three")));
		$expected = array("one", array("two" => "three"));
		$this->assertEquals($out, $expected);

	}

	function test_get(){

		$R = new Containers\Deferred;

		$R->set("bloop", function(){ return md5(mt_rand(1,99999)); });
		$R->set("blooper", 9);

		$val1 = $R->get("bloop");
		$val2 = $R->getNew("bloop");
		$val3 = $R->get("bloop");

		$this->assertNotEquals($val1, $val2, "lambda");
		$this->assertEquals($val1, $val3, "lambda singleton");

		$val = $R->get("blooper");
		$this->assertEquals($val, 9, "scalar");

	}

	function test_raw(){

		$R = new Containers\Deferred;

		$R->set("bloop", function(){ return md5(mt_rand(1,999)); });

		$val1 = $R->raw("bloop");
		$val2 = $R->get("bloop");
		$val3 = $R->raw("bloop");
		$val4 = $R->get("bloop", true);
		$val5 = $R->raw("bloop");

		$this->assertTrue(($val1 InstanceOf Closure), "InstanceOf Closure");
		$this->assertTrue(ctype_xdigit($val2), "ctype_xdigit");
		$this->assertTrue(($val3 InstanceOf Closure), "InstanceOf Closure");
		$this->assertTrue(ctype_xdigit($val4), "ctype_xdigit");
		$this->assertTrue(($val5 InstanceOf Closure), "InstanceOf Closure");

	}
}