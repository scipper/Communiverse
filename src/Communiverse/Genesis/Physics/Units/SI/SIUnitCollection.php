<?php

namespace Communiverse\Genesis\Physics\Units\SI;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 09.09.2015
 * @namespace Communiverse\Genesis\Physics\Units\SI
 * @package Communiverse\Genesis\Physics\Units\SI
 *
 */
class SIUnitCollection {

	const AMPERE = "Ampere";
	const CANDELA = "Candela";
	const KELVIN = "Kelvin";
	const KG = "Kg";
	const METRE = "Metre";
	const MOL = "Mol";
	const SECOND = "Second";
	
	/**
	 * 
	 * @var array[SIUnit]
	 */
	protected $units;
	
	/**
	 * 
	 */
	public function __construct() {
		$this->units = array();
	}

	/**
	 * 
	 * @param string $unit
	 * @return \Communiverse\Genesis\Physics\Units\SI\SIUnit
	 */
	public function get($unit) {
		if(defined("self::".strtoupper($unit))) {
			return $this->define($unit);
		}
		
		return $this->define(self::KG);
	}

	/**
	 * 
	 * @param string $unit
	 * @return \Communiverse\Genesis\Physics\Units\SI\SIUnit
	 */
	private function define($unit) {
		if(!array_key_exists($unit, $this->units)) {
			$class = __NAMESPACE__ ."\\".$unit;
			$this->units[$unit] = new $class();
		}
		
		return $this->units[$unit];
	}	
	
}

?>