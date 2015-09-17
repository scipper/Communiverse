<?php

namespace Communiverse\Genesis\Physics\Units;

use Communiverse\Genesis\Physics\Units\SI\BaseSIUnit;
use Communiverse\Genesis\Physics\Units\SI\SIUnit;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
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