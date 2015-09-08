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
final class Electron extends Particle {
	
	/**
	 * 
	 */
	public function __construct() {
		$this->mass = 9.10908E-28;
		$this->charge = "-";
	}

}

?>
