<?php

namespace Communiverse\Genesis\Atoms;

use Communiverse\Genesis\Atoms\Particles\Proton;
use Communiverse\Genesis\Atoms\Particles\Electron;
use Communiverse\Genesis\Atoms\Particles\Neutron;
use Communiverse\Genesis\Atoms\Series\AlkalineEarthMetals;

/**
 * 
 * @author Steffen Kowalski <scipper@myscipper.de>
 *
 * @since 07.09.2015
 * @namespace Communiverse\Genesis\Atoms
 * @package Communiverse\Genesis\Atoms
 *
 */
class Magnesium extends Atom {
	
	/**
	 * 
	 * @param Proton $proton
	 * @param Electron $electron
	 * @param Neutron $neutron
	 */
	public function __construct(Proton $proton, Electron $electron, Neutron $neutron) {
		parent::__construct($proton, $electron, $neutron);

		$this->protons = 12;
		$this->electrons = 12;
		$this->neutrons = 12;
		
		$this->name = "Magnesium";
		$this->symbol = "Mg";
		
		$this->series = new AlkalineEarthMetals();
	}
	
}

?>