<?php

namespace Communiverse\Genesis\Physics\Units;

use Communiverse\Genesis\Physics\Units\SI\SIUnitCollection;
/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 09.09.2015
 * @namespace Communiverse\Genesis\Physics\Units
 * @package Communiverse\Genesis\Physics\Units
 *
 */
class UnitCollection {

	const BECQUEREL = "Becquerel";
	const CELSIUS = "Celsius";
	const COULOMB = "Coulomb";
	const FARAD = "Farad";
	const GRAY = "Gray";
	const HENRY = "Henry";
	const HERTZ = "Hertz";
	const JOULE = "Joule";
	const LUMEN = "Lumen";
	const LUX = "Lux";
	const NEWTON = "Newton";
	const OHM = "Ohm";
	const PASCAL = "Pascal";
	const SIEMENS = "Siemens";
	const SIEVERT = "Sievert";
	const TESLA = "Tesla";
	const VOLT = "Volt";
	const WATT = "Watt";
	const WEBER = "Weber";
	
	/**
	 * 
	 * @var array[Unit]
	 */
	protected $units;
	
	/**
	 * 
	 * @var SIUnitCollection
	 */
	protected $siuc;
	

	/**
	 * 
	 * @param SIUnitCollection $siuc
	 */
	public function __construct(SIUnitCollection $siuc) {
		$this->units = array();
		$this->siuc = $siuc;
	}

	/**
	 * 
	 * @param string $unit
	 * @return \Communiverse\Genesis\Physics\Units\Unit
	 */
	public function get($unit) {
		if(defined("self::".strtoupper($unit))) {
			return $this->define($unit);
		}
		
		return $this->define(self::HERTZ);
	}

	/**
	 * 
	 * @param string $unit
	 * @return \Communiverse\Genesis\Physics\Units\Unit
	 */
	private function define($unit) {
		if(!array_key_exists($unit, $this->units)) {
			$class = __NAMESPACE__ ."\\".$unit;
			$this->units[$unit] = new $class($this->siuc);
		}
		
		return $this->units[$unit];
	}	
	
}

?>