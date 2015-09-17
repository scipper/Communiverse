<?php

namespace Communiverse\Genesis\Physics\Units;

use Communiverse\Genesis\Atoms\Particles\Proton;
use Communiverse\Genesis\Physics\Units\SI\SIUnit;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 12.09.2015
 * @namespace Communiverse\Genesis\Physics\Units
 * @package Communiverse\Genesis\Physics\Units
 *
 */
interface Unit extends SIUnit {
	
	/**
	 * 
	 * @return array[SIUnit]
	 */
	public function getNumerator();
	
	/**
	 * 
	 * @return array[SIUnit]
	 */
	public function getDenominator();
	
	/**
	 * 
	 * @return string
	 */
	public function buildUnit();
	
}

?>