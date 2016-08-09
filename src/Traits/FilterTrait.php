<?php

namespace Chevron\Containers\Traits;

trait FilterTrait {

	abstract function get($key);

	abstract function set($key, $val);

	public function filter($name, callable $callback = null){
		$value = $this->get($name);
		if($value != null && $callback){
			$value = call_user_func($callback, $value);
			$this->set($name, $value);
		}
		return $value;
	}
}
