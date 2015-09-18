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
	const u = 1.660538921E-27;
	
	
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