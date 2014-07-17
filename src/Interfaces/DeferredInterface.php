<?php

namespace Chevron\Containers\Interfaces;
/**
 * establishes the minimum signature of Chevron\Containers\Registry
 *
 * @package Chevron\Container
 */
interface DeferredInterface extends RegistryInterface {

	/**
	 * method to call the lambda stored at $tag and pass a payload at invokation
	 * @param string $key The lambda
	 * @param array $args The values to pass to the lambda
	 * @return mixed
	 */
	function invoke($key, array $args = array());

	/**
	 * method to retrieve a singleton value from the deferred registry
	 * @param string $key The lambda
	 * @param array $args The values to pass to the lambda
	 * @return mixed
	 */
	function once($key, array $args = array());

}