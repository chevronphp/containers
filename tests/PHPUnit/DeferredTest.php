<?php

use Chevron\Containers;

class DeferredTest extends PHPUnit_Framework_TestCase {

	function test_invoke(){

		$R = new Containers\Deferred;
		$R->set("bloop", function(){ return 5; });
		$val = $R->invoke("bloop", array());
		$this->assertEquals($val, 5);

	}

	function test___call(){

		$R = new Containers\Deferred;
		$R->set("bloop", function(){ return 5; });
		$val = $R->bloop();
		$this->assertEquals($val, 5);

	}

	function test_invoke_w_args(){

		$R = new Containers\Deferred;
		$R->set("bloop", function($n){ return $n; });
		$in = "This is a test";
		$out = $R->invoke("bloop", array($in));
		$this->assertEquals($in, $out);

	}

	function test___call_w_arg(){

		$R = new Containers\Deferred;
		$R->set("bloop", function($n){ return $n; });
		$in = "This is a test";
		$out = $R->bloop($in);
		$this->assertEquals($in, $out);

	}

	function test_invoke_w_many_args(){

		$R = new Containers\Deferred;
		$R->set("bloop", function($a, $b){ return $a + $b; });
		$out = $R->invoke("bloop", array(3, 4));
		$this->assertEquals($out, 7);

	}

	function test_invoke_w_many_args_mixed_type(){

		$R = new Containers\Deferred;
		$R->set("bloop", function($a, $b){ return array($a, $b); });
		$out = $R->invoke("bloop", array("one", array("two" => "three")));
		$expected = array("one", array("two" => "three"));
		$this->assertEquals($out, $expected);

	}

	function test_once(){

		$R = new Containers\Deferred;
		$R->set("bloop", function($a, $b){ return $a + $b; });
		$result = $R->once("bloop", array(3, 4));
		$this->assertEquals($result, 7, "initial call");
		$result = $R->once("bloop", array(5, 6));
		$this->assertEquals($result, 7, "singleton via multiple calls");

	}

	function test_get(){

		$R = new Containers\Deferred;

		$R->set("bloop", function(){ return md5(mt_rand(1,999)); });
		$R->set("blooper", 9);

		$val1 = $R->get("bloop");
		$val2 = $R->get("bloop", true);
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