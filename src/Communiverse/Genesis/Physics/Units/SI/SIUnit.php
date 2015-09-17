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
interface SIUnit {
	
	/**
	 * 
	 * @return string
	 */
	public function getUnit();
	
	/**
	 * 
	 * @return string
	 */
	public function getName();
	
}

?>