<?php

namespace Communiverse\Genesis\Atoms;

use Communiverse\Genesis\Atoms\Particles\Proton;
use Communiverse\Genesis\Atoms\Particles\Electron;
use Communiverse\Genesis\Atoms\Particles\Neutron;
use Communiverse\Genesis\Atoms\Series\Metals;
use Communiverse\Genesis\Atoms\Series\SeriesCollection;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 07.09.2015
 * @namespace Communiverse\Genesis\Atoms
 * @package Communiverse\Genesis\Atoms
 *
 */
class Aluminium extends Atom {

	/**
	 * 
	 * @param Proton $proton
	 * @param Electron $electron
	 * @param Neutron $neutron
	 * @param SeriesCollection $seriesCollection
	 */
	public function __construct(Proton $proton, Electron $electron, Neutron $neutron, SeriesCollection $seriesCollection) {
		parent::__construct($proton, $electron, $neutron, $seriesCollection);

		$this->protons = 13;
		$this->electrons = 13;
		$this->neutrons = 14;
		
		$this->name = "Aluminium";
		$this->symbol = "Al";
		
		$this->series = $seriesCollection->get(SeriesCollection::METALS);
	}
	
}

?>