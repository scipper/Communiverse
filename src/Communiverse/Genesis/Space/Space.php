<?php

namespace Communiverse\Genesis\Space;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 12.09.2015
 * @namespace Communiverse\Genesis\Space
 * @package Communiverse\Genesis\Space
 *
 */
interface Space {
	
	/**
	 * 
	 * @return float
	 */
	public function getWidth();
	
	/**
	 * 
	 * @return float
	 */
	public function getHeight();
	
	/**
	 * 
	 * @return float
	 */
	public function getDepth();
	
}

?>