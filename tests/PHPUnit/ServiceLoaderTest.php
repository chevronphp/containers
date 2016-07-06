<?php

namespace ServiceLoaderTest;

class demoClass{
	public $var;
	public function __construct($demoValue1){
		$this->var = $demoValue1();
	}
}

class demoValue1 {
	public function __invoke(){
		return 1;
	}
}

class ServiceLoaderTest extends \PHPUnit_Framework_TestCase {

	function test_loadDi(){
		$path = __DIR__ . "/helpers";
		$di = (new \Chevron\Containers\ServiceLoader)->loadDi($path);

		// $this->assertEquals($di->get("error"), 404);
		$this->assertEquals($di->get("lambda"), 200);
	}

	/**
	 * @expectedException \Exception
	 */
	function test_loadDi_Exception(){
		$path = __DIR__ . "/nothelpers";
		$di = (new \Chevron\Containers\ServiceLoader)->loadDi($path);

		$this->assertEquals($di->get("error"), 404);
		$this->assertEquals($di->get("lambda"), 200);
	}

	/**
	 * @expectedException \Exception
	 */
	function test_loadDi_Exception2(){
		$path = __DIR__ . "/nothelpers";
		$di = (new \Chevron\Containers\ServiceLoader)->loadDi($path);

		$di->set("error", 404);
	}

	/**
	 */
	function test_demoClass1(){
		$di = new \Chevron\Containers\Di;

		$di->set("demoValue1", demoValue1::class);
		$di->set("dc", demoClass::class);

		$O = $di->get("dc");
		$this->assertEquals(1, $O->var);
	}

}
