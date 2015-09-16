<?php

namespace Communiverse\Genesis\Physics\Units;

use Communiverse\Genesis\Physics\Units\SI\Metre;
use Communiverse\Genesis\Physics\Units\SI\Kg;
use Communiverse\Genesis\Physics\Units\SI\Second;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 13.09.2015
 * @namespace Communiverse\Genesis\Physics\Units
 * @package Communiverse\Genesis\Physics\Units
 *
 */
class Joule extends BaseUnit {
	
	const UNIT = "J";
	
	
	/**
	 * 
	 */
	public function __construct() {
		$this->numerator = array(
			new Metre(),
			new Metre(),
			new Kg(),
		);
		$this->denominator = array(
			new Second(),
			new Second()
		);
	}
	
}

?>