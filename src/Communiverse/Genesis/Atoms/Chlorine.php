<?php

namespace Communiverse\Genesis\Atoms;

use Communiverse\Genesis\Atoms\Particles\Proton;
use Communiverse\Genesis\Atoms\Particles\Electron;
use Communiverse\Genesis\Atoms\Particles\Neutron;
use Communiverse\Genesis\Atoms\Series\Halogens;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 07.09.2015
 * @namespace Communiverse\Genesis\Atoms
 * @package Communiverse\Genesis\Atoms
 *
 */
class Chlorine extends Atom {
	
	/**
	 * 
	 * @param Proton $proton
	 * @param Electron $electron
	 * @param Neutron $neutron
	 */
	public function __construct(Proton $proton, Electron $electron, Neutron $neutron) {
		parent::__construct($proton, $electron, $neutron);

		$this->protons = 17;
		$this->electrons = 17;
		$this->neutrons = 18;
		
		$this->name = "Chlorine";
		$this->symbol = "Cl";
		
		$this->series = new Halogens();
	}
	
}

?>