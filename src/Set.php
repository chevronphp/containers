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
	public function lpush($value){
		array_unshift($this->map, $value);
	}

	/**
	 * push values to our list
	 * @param mixed $value
	 */
	public function rpush($value){
		// array_push
		$this->map[] = $value;
	}

	/**
	 * shift values off our list
	 * @return mixed
	 */
	public function lpop(){
		if($this->count() <= 0) return null;
		return array_shift($this->map);
	}

	/**
	 * pop values off our array
	 * @return mixed
	 */
	public function rpop(){
		if($this->count() <= 0) return null;
		return array_pop($this->map);
	}

	/**
	 * \Countable -- how big is our list
	 * @return int
	 */
	public function count(){
		return count($this->map);
	}

	/**
	 * spin off an iterator for our list
	 * @return \ArrayIterator
	 */
	public function getIterator(){
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





