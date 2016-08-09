<?php

namespace Chevron\Containers;
/**
 * implementation of a list --  a hybrid of a queue and a stack using redis-like
 * methods of left/right push/pop
 *
 * @package Chevron\Container
 */
class Stack extends Registry implements StackInterface {

	/**
	 * push values to our list
	 * @param mixed $value
	 */
	public function push($value){
		array_push($this->map, $value);
	}

	/**
	 * pop values off our array
	 * @return mixed
	 */
	public function pop(){
		if($this->count()){
			return array_pop($this->map);
		}
	}

	/**
	 * view the next item in the stack
	 */
	public function peek($n = 1) {
		if($this->isEmpty() || $n > $this->count() ){
			return null;
		}
		return $this->map[ $this->count() - $n ];
	}

}





