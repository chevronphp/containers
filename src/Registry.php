<?php

namespace Chevron\Containers;
/**
 * base implementation of the registry pattern that supports the countable
 * interface
 *
 * @package Chevron\Container
 */
class Registry implements RegistryInterface, \Countable, \IteratorAggregate {
	/**
	 * The underlying storage array
	 */
	protected $map = array();

	/**
	 * Method to set a single value in the registry
	 * @param scalar $key The key at which to store the value
	 * @param mixed $value The value to store
	 * @return
	 */
	public function set($key, $value){
		$this->map[$key] = $value;
	}

	/**
	 * Method to set many values in the registry
	 * @param array $map The map of key => values
	 * @return
	 */
	public function setMany(array $map){
		foreach($map as $key => $value){
			$this->set($key, $value);
		}
	}

	/**
	 * Method to retrieve the value stored at key
	 * @param string $key The key of the value to retrieve
	 * @return mixed
	 */
	public function get($key){
		if(array_key_exists($key, $this->map)){
			return $this->map[$key];
		}
		return null;
	}

	/**
	 * Method to determine if the registry has a key
	 * @param string $key The key to check
	 * @return bool
	 */
	public function has($key){
		return array_key_exists($key, $this->map);
	}

	/**
	 * Method to get an Iterator for the registry, allows looping
	 * @deprecated
	 * @return \ArrayIterator
	 */
	public function getIterator(){
		return new \ArrayIterator($this->map);
	}

	/**
	 * allow access via generator
	 * @return mixed, mixed
	 */
	public function iter(){
		foreach($this->map as $key => $value){
			yield $key => $value;
		}
	}

	/**
	 * Method to implement \Countable on the registry
	 * @link http://php.net/manual/en/countable.count.php
	 * @return int
	 */
	public function count() {
		return count($this->map);
	}
}
