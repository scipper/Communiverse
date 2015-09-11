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
use Communiverse\Genesis\Atoms\Fluorine;
use Communiverse\Genesis\Atoms\Neon;
use Communiverse\Genesis\Atoms\Sodium;
use Communiverse\Genesis\Atoms\Magnesium;
use Communiverse\Genesis\Atoms\Aluminium;
use Communiverse\Genesis\Atoms\Silicon;
use Communiverse\Genesis\Atoms\Phosphorus;
use Communiverse\Genesis\Atoms\Sulfur;
use Communiverse\Genesis\Atoms\Chlorine;
use Communiverse\Genesis\Atoms\Argon;
use Communiverse\Genesis\Atoms\Potassium;
use Communiverse\Genesis\Atoms\Calcium;
use Communiverse\Genesis\Atoms\Scandium;
use Communiverse\Genesis\Atoms\Titanium;
use Communiverse\Genesis\Atoms\Vanadium;
use Communiverse\Genesis\Atoms\Chromium;
use Communiverse\Genesis\Atoms\Manganese;
use Communiverse\Genesis\Atoms\Iron;
use Communiverse\Genesis\Atoms\Cobalt;
use Communiverse\Genesis\Atoms\Nickel;
use Communiverse\Genesis\Atoms\Copper;
use Communiverse\Genesis\Atoms\Zinc;
use Communiverse\Genesis\Atoms\Gallium;
use Communiverse\Genesis\Atoms\Germanium;
use Communiverse\Genesis\Atoms\Arsenic;
use Communiverse\Genesis\Atoms\Selenium;
use Communiverse\Genesis\Atoms\Bromine;
use Communiverse\Genesis\Atoms\Krypton;
use Communiverse\Genesis\Atoms\Rubidium;
use Communiverse\Genesis\Atoms\Strontium;
use Communiverse\Genesis\Atoms\Yttrium;
use Communiverse\Genesis\Atoms\Zirconium;
use Communiverse\Genesis\Atoms\Niobium;
use Communiverse\Genesis\Atoms\Molybdenum;
use Communiverse\Genesis\Atoms\Series\SeriesCollection;
use Communiverse\Genesis\Atoms\AtomCollection;

$ac = new AtomCollection(
	new Proton(), 
	new Electron(), 
	new Neutron(), 
	new SeriesCollection()
);

$element = $ac->get(AtomCollection::MOLYBDENUM);
echo "weight of ".$element->getName()." (".$element->getSymbol()."): " . $element->getUnitWeight() . PHP_EOL;

?>