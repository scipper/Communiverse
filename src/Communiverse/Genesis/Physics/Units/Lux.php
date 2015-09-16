<?php

namespace Communiverse\Genesis\Physics\Units;

use Communiverse\Genesis\Physics\Units\SI\Candela;
use Communiverse\Genesis\Physics\Units\SI\Metre;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 13.09.2015
 * @namespace Communiverse\Genesis\Physics\Units
 * @package Communiverse\Genesis\Physics\Units
 *
 */
class Lux extends BaseUnit {
	
	const UNIT = "lx";
	
	
	/**
	 * 
	 */
	public function __construct() {
		$this->numerator = array(
			new Candela(),
		);
		$this->denominator = array(
			new Metre(),
			new Metre(),
		);
	}
	
}

?>