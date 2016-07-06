<?php

namespace Chevron\Containers;
/**
 * establishes the minimum signature of Chevron\Containers\Registry
 *
 * @package Chevron\Container
 */
interface RegistryInterface {

	/**
	 * Method to set a single value in the registry
	 * @param scalar $key The key at which to store the value
	 * @param mixed $value The value to store
	 * @return
	 */
	public function set($key, $value);

	/**
	 * Method to retrieve the value stored at key
	 * @param scalar $key The key of the value to retrieve
	 * @return mixed
	 */
	public function get($key);

}
