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
abstract class Particle implements ElementaryParticle {
	
	/**
	 * 
	 * @var float
	 */
	protected $mass;

	/**
	 * 
	 * @var string|NULL
	 */
	private $charge;
	
	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Genesis\ElementaryParticle::getMass()
	 */
	public function getMass() {
		return (float) $this->mass;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Genesis\ElementaryParticle::getCharge()
	 */
	public function getCharge() {
		return $this->charge;
	}
	
}

?>