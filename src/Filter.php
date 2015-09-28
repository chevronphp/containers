<?php

namespace Chevron\Containers;

class Filter {

	protected $map = [];

	function __construct(array $map){
		foreach($map as $k => $v){
			$this->map[$k] = $v;
		}
	}

	function get($name){
		if(!isset($this->map[$name])){
			return null;
		}
		return $this->map[$name];
	}

	function getFiltered($name, callable $callback = null){
		$value = $this->get($name);
		if($value != null && $callback){
			return call_user_func($callback, $value, $name);
		}
		return $value;
	}

	function getAll(){
		return $this->map;
	}

	function getAllFiltered(callable $callback = null){
		$values = $this->getAll();
		if($callback){
			array_walk_recursive($values, $callback);
		}
		return $values;
	}

}
