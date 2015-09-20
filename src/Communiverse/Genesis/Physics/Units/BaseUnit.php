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

use Communiverse\Genesis\Physics\Units\SI\BaseSIUnit;
use Communiverse\Genesis\Physics\Units\SI\SIUnit;

/**
 * 
 * @author Steffen Kowalski <scipper@myscipper.de>
 *
 * @since 13.09.2015
 * @namespace Communiverse\Genesis\Physics\Units
 * @package Communiverse\Genesis\Physics\Units
 *
 */
abstract class BaseUnit extends BaseSIUnit implements Unit {
	
	/**
	 *
	 * @var array[SIUnit]
	 */
	protected $numerator;
	
	/**
	 *
	 * @var array[SIUnit]
	 */
	protected $denominator;
	
	
	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Genesis\Physics\Units\Unit::getNumerator()
	 */
	public function getNumerator() {
		return $this->numerator;
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Genesis\Physics\Units\Unit::getDenominator()
	 */
	public function getDenominator() {
		return $this->denominator;
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Genesis\Physics\Units\Unit::buildUnit()
	 */
	public function buildUnit() {
		$n = "";
		$d = "";

		if(empty($this->numerator)) {
			$n = 1;
		} else {
			$n = implode(" ", $this->numerator);
		}

		if(!empty($this->denominator)) {
			$d = implode(" ", $this->denominator);
		}
		
		return $n . (!empty($d) ? "/" . $d : "");
	}
	
}

?>