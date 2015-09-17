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

namespace Communiverse\Genesis\Atoms\Series;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 09.09.2015
 * @namespace Communiverse\Genesis\Atoms\Series
 * @package Communiverse\Genesis\Atoms\Series
 *
 */
class SeriesCollection {

	const ACTINOIDE = "Actinoide";
	const ALKALIMETALS = "AlkaliMetals";
	const ALKALINEEARTHMETALS = "AlkalineEarthMetals";
	const HALOGENS = "Halogens";
	const LANTHANOIDE = "Lanthanoide";
	const METALLOIDS = "Metalloids";
	const METALS = "Metals";
	const NOBLEGASES = "NobleGases";
	const NONMETALS = "Nonmetals";
	const TRANSITIONMETAL = "TransitionMetal";
	
	/**
	 * 
	 * @var array[Series]
	 */
	protected $series;
	
	/**
	 * 
	 */
	public function __construct() {
		$this->series = array();
	}
	
	/**
	 * 
	 * @param string $series
	 * @return multitype:\Communiverse\Genesis\Atoms\Series\Series
	 */
	public function get($series) {
		if(defined("self::".strtoupper($series))) {
			return $this->define($series);
		}
		
		return $this->define(self::NONMETALS);
	}

	/**
	 * 
	 * @param string $series
	 * @return multitype:\Communiverse\Genesis\Atoms\Series\Series
	 */
	private function define($series) {
		if(!array_key_exists($series, $this->series)) {
			$class = __NAMESPACE__ ."\\".$series;
			$this->series[$series] = new $class();
		}
		
		return $this->series[$series];
	}	
	
}

?>