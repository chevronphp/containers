<?php

use \Chevron\Containers\Interfaces\DiInterface;

return function( DiInterface $di ){

	$di->set("error", 404);

	$di->set("lambda", function(){
		return 200;
	});

};