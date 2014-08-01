<?php

return function( \Chevron\Containers\Interfaces\DiInterface $di ){

	$di->set("error", 404);

	$di->set("lambda", function(){
		return 200;
	});

};