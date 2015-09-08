<?php

ini_set('precision', 33);

include_once 'Classloader.php';

$loader = new Classloader(dirname(__FILE__)."/src/");
$loader->register();

use Communiverse\Genesis\Atoms\Particles\Electron;
use Communiverse\Genesis\Atoms\Particles\Neutron;
use Communiverse\Genesis\Atoms\Particles\Proton;
use Communiverse\Genesis\Atoms\Helium;
use Communiverse\Genesis\Atoms\Atom;
use Communiverse\Genesis\Atoms\Hydrogen;
use Communiverse\Genesis\Atoms\Lithium;
use Communiverse\Genesis\Atoms\Beryllium;
use Communiverse\Genesis\Atoms\Boron;
use Communiverse\Genesis\Atoms\Carbon;
use Communiverse\Genesis\Atoms\Nitrogen;
use Communiverse\Genesis\Atoms\Oxygen;

$proton = new Proton();
$electron = new Electron();
$neutron = new Neutron();

$element = new Oxygen($proton, $electron, $neutron);
echo "weight of ".$element->getName()." (".$element->getSymbol()."): " . $element->getUnitWeight() . PHP_EOL;

?>