<?php

namespace Communiverse\Genesis\Atoms\Particles;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 07.09.2015
 * @namespace Communiverse\Genesis\Atoms\Particles
 * @package Communiverse\Genesis\Atoms\Particles
 *
 */
final class Proton extends Particle {
	
	/**
	 * 
	 */
	public function __construct() {
		$this->mass = 1.67252E-24;
		$this->charge = "+";
	}

}

?>
