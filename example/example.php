<?php

use \Chevron\ObjectLoader\ObjectLoader;
use \Chevron\Containers\Di;

/**
 * create a new Di, loaded with stuff
 */

$di = (new ObjectLoader)->loadObject(new Di, "path-to/top-level/services-dir");