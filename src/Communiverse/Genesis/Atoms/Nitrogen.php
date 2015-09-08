<?php

namespace Communiverse\Genesis\Atoms;

use Communiverse\Genesis\Atoms\Particles\Proton;
use Communiverse\Genesis\Atoms\Particles\Electron;
use Communiverse\Genesis\Atoms\Particles\Neutron;
/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 07.09.2015
 * @namespace Communiverse\Genesis\Atoms
 * @package Communiverse\Genesis\Atoms
 *
 */
class Nitrogen extends Atom {
	
	/**
	 * 
	 * @param Proton $proton
	 * @param Electron $electron
	 * @param Neutron $neutron
	 */
	public function __construct(Proton $proton, Electron $electron, Neutron $neutron) {
		parent::__construct($proton, $electron, $neutron);

		$this->protons = 7;
		$this->electrons = 7;
		$this->neutrons = 6;
		
		$this->name = "Nitrogen";
		$this->symbol = "N";
	}
	
}

?>