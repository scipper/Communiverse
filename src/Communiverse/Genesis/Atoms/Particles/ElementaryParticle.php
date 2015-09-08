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
interface ElementaryParticle {
	
	/**
	 * 
	 * @return float
	 */
	public function getMass();
	
	/**
	 * 
	 * @return string|NULL
	 */
	public function getCharge();
	
}

?>