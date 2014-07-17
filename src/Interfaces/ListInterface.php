<?php

namespace Chevron\Containers\Interfaces;
/**
 * establishes the minimum signature of Chevron\Containers\Registry
 *
 * @package Chevron\Container
 */
interface ListInterface {

	/**
	 * unshift values to our list
	 * @param mixed $value
	 */
	function lpush($value);

	/**
	 * push values to our list
	 * @param mixed $value
	 */
	function rpush($value);

	/**
	 * shift values off our list
	 * @return mixed
	 */
	function lpop();

	/**
	 * pop values off our array
	 * @return mixed
	 */
	function rpop();

	/**
	 * \Countable -- how big is our list
	 * @return int
	 */
	function count();

}