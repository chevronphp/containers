<?php

namespace Chevron\Containers;
/**
 * alias Deffered to Di
 *
 * @package Chevron\Container
 */
class Di extends Deferred {

	use Traits\ReflectiveDiMethodParamsTrait;

	protected function invoke($key, array $args = []) {

		if( !array_key_exists($key, $this->map) ) {
			throw new \InvalidArgumentException("{$key} does not exist.");
		}

		$entry = $this->map[$key];

		switch(true){
			case is_callable($entry):
				$result = call_user_func_array($entry, $args);
				break;
			case is_object($entry):
				$result = $entry;
				break;
			case class_exists($entry):
				$result = $this->constructInstanceFromReflectiveDiMethodParams($this, $entry, $args);
				break;
			default:
				throw new \RuntimeException;
				break;
		}

		return $result;

	}

	public function set($key, $value) {
		switch(true){
			case is_object($value):
			case is_callable($value):
			case is_string($value): // don't check if it is a class until get as it triggers the autoloader
				return $this->map[$key] = $value;
				break;
			default:
				throw new \InvalidArgumentException("Entries in Di must be a callable, a class name as a string, or an existing instance of an object.");
				break;
		}
	}

}

