<?php

namespace Communiverse\Genesis\Physics\Units;

use Communiverse\Genesis\Physics\Units\SI\Candela;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 13.09.2015
 * @namespace Communiverse\Genesis\Physics\Units
 * @package Communiverse\Genesis\Physics\Units
 *
 */
class Lumen extends BaseUnit {
	
	const UNIT = "lm";
	
	
	/**
	 * 
	 */
	public function __construct() {
		$this->numerator = array(
			new Candela(),
		);
		$this->denominator = array(
		);
	}
	
}

?>