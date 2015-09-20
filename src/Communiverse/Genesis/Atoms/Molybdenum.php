<?php

namespace Communiverse\Genesis\Atoms;

use Communiverse\Genesis\Atoms\Particles\Proton;
use Communiverse\Genesis\Atoms\Particles\Electron;
use Communiverse\Genesis\Atoms\Particles\Neutron;
use Communiverse\Genesis\Atoms\Series\TransitionMetal;
use Communiverse\Genesis\Atoms\Series\Series;
use Communiverse\Genesis\Atoms\Series\SeriesCollection;

/**
 * 
 * @author Steffen Kowalski <scipper@myscipper.de>
 *
 * @since 07.09.2015
 * @namespace Communiverse\Genesis\Atoms
 * @package Communiverse\Genesis\Atoms
 *
 */
class Molybdenum extends Atom {

	/**
	 * 
	 * @param Proton $proton
	 * @param Electron $electron
	 * @param Neutron $neutron
	 * @param SeriesCollection $seriesCollection
	 */
	public function __construct(Proton $proton, Electron $electron, Neutron $neutron, SeriesCollection $seriesCollection) {
		parent::__construct($proton, $electron, $neutron, $seriesCollection);

		$this->protons = 42;
		$this->electrons = 42;
		$this->neutrons = 54;
		
		$this->name = "Molybdenum";
		$this->symbol = "Mo";
		
		$this->series = $seriesCollection->get(SeriesCollection::TRANSITIONMETAL);
	}
	
}

?>