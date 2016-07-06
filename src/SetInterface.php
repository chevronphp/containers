<?php

namespace Chevron\Containers;
/**
 * establishes the minimum signature of Chevron\Containers\Registry
 *
 * @package Chevron\Container
 */
interface SetInterface {

	/**
	 * unshift values to our list
	 * @param mixed $value
	 */
	public function lpush($value);

	/**
	 * push values to our list
	 * @param mixed $value
	 */
	public function rpush($value);

	/**
	 * shift values off our list
	 * @return mixed
	 */
	public function lpop();

	/**
	 * pop values off our array
	 * @return mixed
	 */
	public function rpop();

	/**
	 * \Countable -- how big is our list
	 * @return int
	 */
	public function count();

}
