<?php

namespace Chevron\Containers;
/**
 * establishes the minimum signature of Chevron\Containers\Registry
 *
 * @package Chevron\Container
 */
interface StackInterface extends RegistryInterface {

	/**
	 * push values to our list
	 * @param mixed $value
	 */
	public function push($value);

	/**
	 * shift values off our list
	 * @return mixed
	 */
	public function pop();

}
