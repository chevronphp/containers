<?php

class ServiceLoaderTest extends PHPUnit_Framework_TestCase {

	function test_loadDi(){
		$path = __DIR__ . "/helpers";
		$di = (new \Chevron\Containers\ServiceLoader)->loadDi($path);

		$this->assertEquals($di->get("error"), 404);
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

}