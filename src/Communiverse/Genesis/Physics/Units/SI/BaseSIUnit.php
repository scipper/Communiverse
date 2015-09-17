<?php

namespace Communiverse\Genesis\Physics\Units\SI;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
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
	
}

?>