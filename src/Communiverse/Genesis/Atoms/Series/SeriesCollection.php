<?php

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
			$series = __NAMESPACE__ ."\\".$series;
			$this->series[$series] = new $series();
		}
		
		return $this->series[$series];
	}	
	
}

?>