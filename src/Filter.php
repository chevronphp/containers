<?php

namespace Chevron\Containers;

class Filter {

	protected $map = [];

	public function __construct(array $map){
		foreach($map as $k => $v){
			$this->map[$k] = $v;
		}
	}

	public function get($name){
		if(!isset($this->map[$name])){
			return null;
		}
		return $this->map[$name];
	}

	public function getFiltered($name, callable $callback = null){
		$value = $this->get($name);
		if($value != null && $callback){
			return call_user_func($callback, $value, $name);
		}
		return $value;
	}

	public function getAll(){
		return $this->map;
	}

	public function getAllFiltered(callable $callback = null){
		$values = $this->getAll();
		if($callback){
			array_walk_recursive($values, $callback);
		}
		return $values;
	}

}
