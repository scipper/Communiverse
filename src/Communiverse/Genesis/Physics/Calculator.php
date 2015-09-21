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

namespace Communiverse\Genesis\Physics;

use Communiverse\Genesis\Physics\Units\CalculatedUnit;
use Communiverse\Genesis\Physics\Units\UnitCollection;
use Communiverse\Genesis\Physics\Units\SI\SIUnitCollection;
use Communiverse\Genesis\Physics\Units\Gravitation;

/**
 * 
 * @author Steffen Kowalski <scipper@myscipper.de>
 *
 * @since 20.09.2015
 * @namespace Communiverse\Genesis\Physics
 * @package Communiverse\Genesis\Physics
 *
 */
class Calculator {
	
	/**
	 * 
	 * @var UnitCollection
	 */
	protected $uc;
	
	
	/**
	 * 
	 * @param UnitCollection $uc
	 */
	public function __construct(UnitCollection $uc) {
		$this->uc = $uc;
	}
	
	/**
	 * 
	 * @param Number $a
	 * @param Number $b
	 * @return \Communiverse\Genesis\Physics\Number
	 */
	public function multiply(Number $a, Number $b) {
		$c = $a->getNumber() * $b->getNumber();
		
		$num = array_merge($a->getNumerator(), $b->getNumerator());
		$denom = array_merge($a->getDenominator(), $b->getDenominator());
		$this->calcUnits($num, $denom);
		
		$calcUnit = new CalculatedUnit(
			$num, 
			$denom
		);
		
		return new Number($c, $calcUnit);
	}

	/**
	 * 
	 * @param Number $a
	 * @param Number $b
	 * @return \Communiverse\Genesis\Physics\Number
	 * @throws \Exception
	 */
	public function divide(Number $a, Number $b) {
		if($b->getNumber() <= 0) {
			throw new \Exception("Cannot divide by zero");
		}
		$c = $a->getNumber() / $b->getNumber();
		
		$num = array_merge($a->getNumerator(), $b->getDenominator());
		$denom = array_merge($a->getDenominator(), $b->getNumerator());
		$this->calcUnits($num, $denom);
		
		$calcUnit = new CalculatedUnit(
				$num,
				$denom
		);
		
		return new Number($c, $calcUnit);
	}
	
	/**
	 * 
	 * @param array $num
	 * @param array $demon
	 */
	public function calcUnits(array &$num , array &$denom) {
		foreach($num as $ak => $anum) {
			if(($found = array_search($anum, $denom)) !== false) {
				unset($num[$ak]);
				unset($denom[$found]);
			}
		}
	}
	
	/**
	 * 
	 * @param Number $m1
	 * @param Number $m2
	 * @param float $r
	 * @return \Communiverse\Genesis\Physics\Number
	 */
	public function calculateGravity(Number $m1, Number $m2, $r) {
		$radius = new Number($r, $this->uc->getSI()->get(SIUnitCollection::METRE));
		$radius = $this->multiply($radius, $radius);
		$m = $this->multiply($m1, $m2);
		$v = $this->divide($m, $radius);
		
		return $this->multiply(new Number(Gravitation::NUMBER, $this->uc->get(UnitCollection::GRAVITATION)), $v);
	}
	
}

?>