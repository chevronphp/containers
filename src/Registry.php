<?php

namespace Chevron\Containers;
/**
 * base implementation of the registry pattern that supports the countable
 * interface
 *
 * @package Chevron\Container
 */
class Registry extends Reference implements RegistryInterface {


	/** inheritdoc */
	public function set($key, $value){
		$this->map[$key] = $value;
	}

	/** inheritdoc */
	public function setMany(array $map){
		foreach($map as $key => $value){
			$this->set($key, $value);
		}
	}

	/** inheritdoc */
	public function get($key){
		if(array_key_exists($key, $this->map)){
			return $this->map[$key];
		}
		return null;
	}

	/** inheritdoc */
	public function has($key){
		return array_key_exists($key, $this->map);
	}

	/** inheritdoc */
	public function del($key){
		unset($this->map[$key]);
	}

	/**
	 * allow access via generator
	 * @return mixed, mixed
	 */
	public function range(){
		foreach($this->map as $key => $value){
			yield $key => $value;
		}
	}


}
