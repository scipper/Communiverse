<?php

namespace Communiverse\Genesis\Physics\Units;

use Communiverse\Genesis\Physics\Units\SI\Second;
use Communiverse\Genesis\Physics\Units\SI\Ampere;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 13.09.2015
 * @namespace Communiverse\Genesis\Physics\Units
 * @package Communiverse\Genesis\Physics\Units
 *
 */
class Coulomb extends BaseUnit {
	
	const UNIT = "C";
	
	
	/**
	 * 
	 */
	public function __construct() {
		$this->numerator = array(
			new Second(),
			new Ampere(),
		);
		$this->denominator = array(
		);
	}
	
}

?>