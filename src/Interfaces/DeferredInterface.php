<?php

namespace Chevron\Containers\Interfaces;
/**
 * establishes the minimum signature of Chevron\Containers\Registry
 *
 * @package Chevron\Container
 */
interface DeferredInterface extends RegistryInterface {

	/**
	 * Method to retrieve the value stored at key. Allows for Di style lambda or
	 * scalar retrieval.
	 * @param string $key The key of the value to retrieve
	 * @return mixed
	 */
	function get($key);

	/**
	 * Method to retrieve the value stored at key via another invocation.
	 * @param string $key The key of the value to retrieve
	 * @param array $args The args to pass the callable
	 * @return mixed
	 */
	function getNew($key, array $args = []);

}