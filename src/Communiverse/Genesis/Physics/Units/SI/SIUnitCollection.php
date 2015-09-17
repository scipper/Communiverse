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