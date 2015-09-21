<?php

ini_set('precision', 33);

include_once 'Classloader.php';

$loader = new Classloader(dirname(__FILE__)."/src/");
$loader->register();

use Communiverse\Environment\Experimental;
use Communiverse\Environment\Influence\InputManager;
use Communiverse\Environment\Influence\StdEventListener;
use Communiverse\Tools\Timer;

$creator = new Experimental(
	new InputManager(new StdEventListener()),
	new Timer()
);
$creator->coreInit();
$creator->run();

?>