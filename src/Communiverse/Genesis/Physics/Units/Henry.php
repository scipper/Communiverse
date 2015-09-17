<?php

namespace Communiverse\Genesis\Physics\Units;

use Communiverse\Genesis\Physics\Units\SI\SIUnitCollection;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 13.09.2015
 * @namespace Communiverse\Genesis\Physics\Units
 * @package Communiverse\Genesis\Physics\Units
 *
 */
class Henry extends BaseUnit {
	
	const UNIT = "H";
	
	
	/**
	 * 
	 * @param SIUnitCollection $siuc
	 */
	public function __construct(SIUnitCollection $siuc) {
		$this->numerator = array(
			$siuc->get(SIUnitCollection::METRE),
			$siuc->get(SIUnitCollection::METRE),
			$siuc->get(SIUnitCollection::KG),
		);
		$this->denominator = array(
			$siuc->get(SIUnitCollection::SECOND),
			$siuc->get(SIUnitCollection::SECOND),
			$siuc->get(SIUnitCollection::AMPERE),
			$siuc->get(SIUnitCollection::AMPERE),
		);
	}
	
}

?>