<?php

namespace Communiverse\Genesis\Physics\Units;

use Communiverse\Genesis\Physics\Units\SI\Kg;
use Communiverse\Genesis\Physics\Units\SI\Metre;
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
class Newton extends BaseUnit {
	
	const UNIT = "N";
	
	
	/**
	 * 
	 */
	public function __construct() {
		$this->numerator = array(
			new Kg(),
			new Metre()
		);
		$this->denominator = array(
			new Second(),
			new Second()
		);
	}
	
}

?>