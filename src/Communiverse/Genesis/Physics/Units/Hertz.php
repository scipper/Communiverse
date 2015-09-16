<?php

namespace Communiverse\Genesis\Physics\Units;

use Communiverse\Genesis\Physics\Units\SI\Second;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 12.09.2015
 * @namespace Communiverse\Genesis\Physics\Units
 * @package Communiverse\Genesis\Physics\Units
 *
 */
class Hertz extends BaseUnit {
	
	const UNIT = "Hz";
	

	/**
	 * 
	 */
	public function __construct() {
		$this->numerator = array();
		$this->denominator = array(
			new Second()				
		);
	}
	
}

?>