<?php

ini_set('precision', 33);

include_once 'Classloader.php';

$loader = new Classloader(dirname(__FILE__)."/src/");
$loader->register();

use Communiverse\Genesis\Atoms\Particles\Electron;
use Communiverse\Genesis\Atoms\Particles\Neutron;
use Communiverse\Genesis\Atoms\Particles\Proton;
use Communiverse\Genesis\Atoms\Series\SeriesCollection;
use Communiverse\Genesis\Atoms\AtomCollection;
use Communiverse\Genesis\Physics\Units\Newton;
use Communiverse\Genesis\Physics\Units\Pascal;
use Communiverse\Genesis\Physics\Units\Joule;
use Communiverse\Genesis\Physics\Units\Watt;
use Communiverse\Genesis\Physics\Units\Coulomb;
use Communiverse\Genesis\Physics\Units\Volt;

$ac = new AtomCollection(
	new Proton(), 
	new Electron(), 
	new Neutron(), 
	new SeriesCollection()
);

$element = $ac->get(AtomCollection::MOLYBDENUM);
echo "weight of ".$element->getName()." (".$element->getSymbol()."): " . $element->getUnitWeight() . PHP_EOL;

$second = new Volt();
echo "unit of: " . $second->buildUnit() . " (".$second->getUnit().")" . PHP_EOL;

?>