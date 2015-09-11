<?php

namespace Communiverse\Genesis\Atoms;

use Communiverse\Genesis\Atoms\Particles\Proton;
use Communiverse\Genesis\Atoms\Particles\Electron;
use Communiverse\Genesis\Atoms\Particles\Neutron;
use Communiverse\Genesis\Atoms\Series\Series;
use Communiverse\Genesis\Atoms\Series\SeriesCollection;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 07.09.2015
 * @namespace Communiverse\Genesis\Atoms
 * @package Communiverse\Genesis\Atoms
 *
 */
abstract class Atom {
	
	/**
	 * 
	 * @var float
	 */
	const u = 1.660538921E-24;
	
	
	/**
	 * 
	 * @var string
	 */
	protected $name;
	
	/**
	 * 
	 * @var string
	 */
	protected $symbol;
	
	/**
	 * 
	 * @var Series
	 */
	protected $series;
	
	/**
	 * 
	 * @var Proton
	 */
	protected $proton;
	
	/**
	 * 
	 * @var integer
	 */
	protected $protons;
	
	/**
	 * 
	 * @var Electron
	 */
	protected $electron;
	
	/**
	 * 
	 * @var integer
	 */
	protected $electrons;
	
	/**
	 * 
	 * @var Neutron
	 */
	protected $neutron;
	
	/**
	 * 
	 * @var integer
	 */
	protected $neutrons;
	

	/**
	 * 
	 * @param Proton $proton
	 * @param Electron $electron
	 * @param Neutron $neutron
	 * @param SeriesCollection $seriesCollection
	 */
	public function __construct(Proton $proton, Electron $electron, Neutron $neutron, SeriesCollection $seriesCollection) {
		$this->proton = $proton;
		$this->electron = $electron;
		$this->neutron = $neutron;
		$this->series = $seriesCollection->get(0);
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getSymbol() {
		return $this->symbol;
	}
	
	/**
	 * 
	 * @return \Communiverse\Genesis\Atoms\Series\Series
	 */
	public function getSeries() {
		return $this->series;
	}
	
	/**
	 * 
	 * @return integer
	 */
	public function getProtons() {
		return $this->protons;
	}
	
	/**
	 * 
	 * @return integer
	 */
	public function getNeutrons() {
		return $this->neutrons;
	}
	
	/**
	 * 
	 * @return integer
	 */
	public function getElectrons() {
		return $this->electrons;
	}
	
	/**
	 * 
	 * @return float
	 */
	public function getWeight() {
		return ($this->electrons * $this->electron->getMass()) + 
			($this->protons * $this->proton->getMass()) + 
			($this->neutrons * $this->neutron->getMass());
	}
	
	/**
	 * 
	 * @return float
	 */
	public function getUnitWeight() {
		return ($this->electrons * ($this->electron->getMass() / Atom::u)) + 
			($this->protons * ($this->proton->getMass() / Atom::u)) + 
			($this->neutrons * ($this->neutron->getMass() / Atom::u));
	}
	
}

?>