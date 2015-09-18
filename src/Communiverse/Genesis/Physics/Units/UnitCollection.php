<?php

/*
 * The MIT License (MIT)
 * 
 * Copyright (c) 2015 Steffen Kowalski
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 * 
 */

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
	 * @return \Communiverse\Genesis\Physics\Units\SI\SIUnitCollection
	 */
	public function getSI() {
		return $this->siuc;
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