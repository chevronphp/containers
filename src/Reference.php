<?php

namespace Chevron\Containers;
/**
 * implementation of the registry pattern that supports wrapping map via
 * reference -- for use with the $_SESSION
 *
 * @package Chevron\Container
 */
abstract class Reference implements \Countable{

	/**
	 * The internal data array
	 */
	protected $map;
	/**
	 * If an array is passed to the constructor, it is assigned by REFERENCE
	 * This is useful for a generic API to interact with the SESSION array
	 *
	 * @param array &$map The array to reference
	 * @return
	 */
	public function __construct( &$map = null ) {
		if( $map === null ) {
			$map = [];
		}

		$this->map =& $map;
	}

	/**
	 * Method to implement \Countable on the registry
	 * @link http://php.net/manual/en/countable.count.php
	 * @return int
	 */
	public function count() {
		return count($this->map);
	}

	/**
	 * is the current set empty
	 */
	public function isEmpty(){
		return $this->count() <= 0;
	}
}

