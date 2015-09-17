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
use Communiverse\Genesis\Physics\Units\Farad;
use Communiverse\Genesis\Physics\Units\Ohm;
use Communiverse\Genesis\Physics\Units\Siemens;
use Communiverse\Genesis\Physics\Units\Weber;
use Communiverse\Genesis\Physics\Units\Tesla;
use Communiverse\Genesis\Physics\Units\Henry;
use Communiverse\Genesis\Physics\Units\Lumen;
use Communiverse\Genesis\Physics\Units\Celsius;
use Communiverse\Genesis\Physics\Units\Lux;
use Communiverse\Genesis\Physics\Units\Becquerel;
use Communiverse\Genesis\Physics\Units\Gray;
use Communiverse\Genesis\Physics\Units\Sievert;
use Communiverse\Genesis\Physics\Units\SI\SIUnitCollection;
use Communiverse\Genesis\Physics\Units\UnitCollection;

$ac = new AtomCollection(
	new Proton(), 
	new Electron(), 
	new Neutron(), 
	new SeriesCollection()
);

$uc = new UnitCollection(
	new SIUnitCollection()
);

$element = $ac->get(AtomCollection::MOLYBDENUM);
echo "weight of ".$element->getName()." (".$element->getSymbol()."): " . $element->getUnitWeight() . PHP_EOL;

$unit = new Sievert();
echo "unit of " . $unit->getName() . " (".$unit->getUnit()."): " . $unit->buildUnit() . PHP_EOL;

?>