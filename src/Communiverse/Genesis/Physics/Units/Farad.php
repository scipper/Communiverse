<?php

namespace Communiverse\Genesis\Physics\Units;

use Communiverse\Genesis\Physics\Units\SI\Second;
use Communiverse\Genesis\Physics\Units\SI\Ampere;
use Communiverse\Genesis\Physics\Units\SI\Metre;
use Communiverse\Genesis\Physics\Units\SI\Kg;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 13.09.2015
 * @namespace Communiverse\Genesis\Physics\Units
 * @package Communiverse\Genesis\Physics\Units
 *
 */
class Farad extends BaseUnit {
	
	const UNIT = "F";
	
	
	/**
	 * 
	 */
	public function __construct() {
		$this->numerator = array(
			new Second(),
			new Second(),
			new Second(),
			new Second(),
			new Ampere(),
			new Ampere(),
		);
		$this->denominator = array(
			new Metre(),
			new Metre(),
			new Kg(),
		);
	}
	
}

?>