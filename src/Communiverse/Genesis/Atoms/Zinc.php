<?php

namespace Communiverse\Genesis\Atoms;

use Communiverse\Genesis\Atoms\Particles\Proton;
use Communiverse\Genesis\Atoms\Particles\Electron;
use Communiverse\Genesis\Atoms\Particles\Neutron;
use Communiverse\Genesis\Atoms\Series\TransitionMetal;

/**
 * 
 * @author Steffen Kowalski <scipper@myscipper.de>
 *
 * @since 07.09.2015
 * @namespace Communiverse\Genesis\Atoms
 * @package Communiverse\Genesis\Atoms
 *
 */
class Zinc extends Atom {
	
	/**
	 * 
	 * @param Proton $proton
	 * @param Electron $electron
	 * @param Neutron $neutron
	 */
	public function __construct(Proton $proton, Electron $electron, Neutron $neutron) {
		parent::__construct($proton, $electron, $neutron);

		$this->protons = 30;
		$this->electrons = 30;
		$this->neutrons = 35;
		
		$this->name = "Zinc";
		$this->symbol = "Zn";
		
		$this->series = new TransitionMetal();
	}
	
}

?>