<?php

namespace Chevron\Containers;
/**
 * implementation of the registry pattern that supports lambdas over/against
 * scalar values
 *
 * @package Chevron\Container
 */
class Deferred extends Registry implements Interfaces\DeferredInterface, Interfaces\DiInterface {

	/**
	 * an additional map for storing the return of singleton lambdas
	 */
	protected $called = [];

	/**
	 * method to get a value in $this->map without calling it
	 * @param string $key The key of the value
	 * @return mixed
	 */
	function raw($key){
		return parent::get($key);
	}

	/**
	 * Method to retrieve the value stored at key. Allows for Di style lambda or
	 * scalar retrieval.
	 * @param string $key The key of the value to retrieve
	 * @return mixed
	 */
	function get($key){
		return $this->once($key);
	}

	/**
	 * Method to retrieve the value stored at key via another invocation.
	 * @param string $key The key of the value to retrieve
	 * @param array $args The args to pass the callable
	 * @return mixed
	 */
	function getNew($key, array $args = []){
		return $this->invoke($key, $args);

	}

	/**
	 * method to retrieve a singleton value from the deferred registry
	 * @param string $key The lambda
	 * @param array $args The values to pass to the lambda
	 * @return mixed
	 */
	function once($key, array $args = []) {

		if(!isset($this->called[$key])) {
			$this->called[$key] = $this->invoke($key, $args);
		}

		return $this->called[$key];

	}

	/**
	 * method to call the lambda stored at $tag and pass a payload at invocation
	 * @param string $key The lambda
	 * @param array $args The values to pass to the lambda
	 * @return mixed
	 */
	function invoke($key, array $args = []){

		if(!array_key_exists($key, $this->map) ) {
			return null;
		}

		if(!is_callable($this->map[$key])){
			return $this->map[$key];
		}

		return call_user_func_array($this->map[$key], $args);
	}

}

