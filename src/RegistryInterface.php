<?php

namespace Chevron\Containers;
/**
 * establishes the minimum signature of Chevron\Containers\Registry
 *
 * @package Chevron\Container
 */
interface RegistryInterface {

	/**
	 * Method to retrieve the value stored at key
	 * @param scalar $key The key of the value to retrieve
	 * @return mixed
	 */
	public function get($key);

	/**
	 * check to see if the current registry is empty
	 * @return  bool description
	 */
	public function isEmpty();

	/**
	 * Method to set a single value in the registry
	 * @param scalar $key The key at which to store the value
	 * @param mixed $value The value to store
	 * @return
	 */
	public function set($key, $value);

	/**
	 * set many items at once
	 * @param  array $map the map of key=>value pairs to set into the underlying map
	 * @return
	 */
	public function setMany(array $map);

	/**
	 * Method to determine if the registry has a key
	 * @param string $key The key to check
	 * @return bool
	 */
	public function has($key);

	/**
	 * remove a key from the registry
	 * @param string $key The key to remove
	 * @return
	 */
	public function del($key);

}
