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
 * @author Steffen Kowalski <scipper@myscipper.de>
 *
 * @since 13.09.2015
 * @namespace Communiverse\Genesis\Physics\Units\SI
 * @package Communiverse\Genesis\Physics\Units\SI
 *
 */
abstract class BaseSIUnit implements SIUnit {
	
	/**
	 * 
	 * @return string
	 */
	public function __toString() {
		return $this->getUnit();
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Genesis\Physics\Units\SI\SIUnit::getUnit()
	 */
	public function getUnit() {
		return static::UNIT;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Genesis\Physics\Units\SI\SIUnit::getName()
	 */
	public function getName() {
		return get_class($this);
	}	
	
	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Genesis\Physics\Units\SI\SIUnit::getNumerator()
	 */
	public function getNumerator() {
		return array($this);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Genesis\Physics\Units\SI\SIUnit::getDenominator()
	 */
	public function getDenominator() {
		return array();
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Genesis\Physics\Units\SI\SIUnit::buildUnit()
	 */
	public function buildUnit() {
		return $this->getUnit();
	}
	
}

?>