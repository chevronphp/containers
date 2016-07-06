<?php

namespace Chevron\Containers;

use \Chevron\ObjectLoader\ObjectLoader;
/**
 * A recursive service loader to parse a directory (recursivley) and load in PHP
 * file found. If the file returns a callable, it is called and passed a Deferred
 * container. Essentially, this class creates a Di, and loads it from a number of
 * service files. Each file should look like:
 *
 * <?php
 * return function($di){
 *     $di->set("nameOne", $value);
 *     $di->set("nameTwo", function() use ($di){});
 * }
 *
 * $value can be a callback (for singleton connections etc.)
 *
 * @package Chevron\Container
 */
class ServiceLoader {

	public function loadServices($path){

		return (new ObjectLoader)->loadObject(new Di, $path);

	}

	public function loadDi($path){
		return $this->loadServices($path);
	}

}
