<?php

namespace Chevron\Containers;
/**
 * implementation of a list --  a hybrid of a queue and a stack using redis-like
 * methods of left/right push/pop
 *
 * @package Chevron\Container
 */
class Set implements SetInterface, \Countable, \IteratorAggregate {

	/**
	 * hold our values internally
	 */
	protected $map = array();

	/**
	 * unshift values to our list
	 * @param mixed $value
	 */
	function lpush($value){
		array_unshift($this->map, $value);
	}

	/**
	 * push values to our list
	 * @param mixed $value
	 */
	function rpush($value){
		// array_push
		$this->map[] = $value;
	}

	/**
	 * shift values off our list
	 * @return mixed
	 */
	function lpop(){
		if($this->count() <= 0) return null;
		return array_shift($this->map);
	}

	/**
	 * pop values off our array
	 * @return mixed
	 */
	function rpop(){
		if($this->count() <= 0) return null;
		return array_pop($this->map);
	}

	/**
	 * \Countable -- how big is our list
	 * @return int
	 */
	function count(){
		return count($this->map);
	}

	/**
	 * spin off an iterator for our list
	 * @return \ArrayIterator
	 */
	function getIterator(){
		return new \ArrayIterator($this->map);
	}

	/**
	 * spin off a generator for our list
	 * @yield \Generator
	 */
	// function range($rev = false){
	// 	$map = $rev ? array_reverse($this->map) : $this->map;
	// 	foreach($map as $value){
	// 		yield $value;
	// 	}
	// }

}





