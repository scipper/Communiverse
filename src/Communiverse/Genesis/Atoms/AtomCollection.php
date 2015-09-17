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
use Communiverse\Genesis\Atoms\Series\SeriesCollection;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 10.09.2015
 * @namespace Communiverse\Genesis\Atoms
 * @package Communiverse\Genesis\Atoms
 *
 */
class AtomCollection {
	
	const HELIUM = "Helium";	
	const ALUMINIUM = "Aluminium";
	const ARGON = "Argon";
	const ARSENIC = "Arsenic";
	const BERYLLIUM = "Beryllium";
	const BORON = "Boron";
	const BROMINE = "Bromine";
	const CALCIUM = "Calcium";
	const CARBON = "Carbon";
	const CHLORINE = "Chlorine";
	const CHROMIUM = "Chromium";
	const COBALT = "Cobalt";
	const COPPER = "Copper";
	const FLUORINE = "Fluorine";
	const GALLIUM = "Gallium";
	const GERMANIUM = "Germanium";
	const HYDROGEN = "Hydrogen";
	const IRON = "Iron";
	const KRYPTON = "Krypton";
	const LITHIUM = "Lithium";
	const MAGNESIUM = "Magnesium";
	const MANGANESE = "Manganese";
	const MOLYBDENUM = "Molybdenum";
	const NEON = "Neon";
	const NICKEL = "Nickel";
	const NIOBIUM = "Niobium";
	const NITROGEN = "Nitrogen";
	const OXYGEN = "Oxygen";
	const PHOSPHORUS = "Phosphorus";
	const POTASSIUM = "Potassium";
	const RUBIDIUM = "Rubidium";
	const SCANDIUM = "Scandium";
	const SELENIUM = "Selenium";
	const SILICON = "Silicon";
	const SODIUM = "Sodium";
	const STRONTIUM = "Strontium";
	const SULFUR = "Sulfur";
	const TITANIUM = "Titanium";
	const VANADIUM = "Vanadium";
	const YTTRIUM = "Yttrium";
	const ZINC = "Zinc";
	const ZIRCONIUM = "Zirconium";
	
	/**
	 * 
	 * @var Proton
	 */
	protected $proton;
	
	/**
	 * 
	 * @var Electron
	 */
	protected $electron;
	
	/**
	 * 
	 * @var Neutron
	 */
	protected $neutron;
	
	/**
	 * 
	 * @var SeriesCollection
	 */
	protected $sc;
	
	/**
	 *
	 * @var array[Atom]
	 */
	protected $atoms;
	
	
	/**
	 * 
	 * @param Proton $proton
	 * @param Electron $electron
	 * @param Neutron $neutron
	 * @param SeriesCollection $sc
	 */
	public function __construct(Proton $proton, Electron $electron, Neutron $neutron, SeriesCollection $sc) {
		$this->atoms = array();
		$this->proton = $proton;
		$this->electron = $electron;
		$this->neutron = $neutron;
		$this->sc = $sc;
	}
	
	/**
	 * 
	 * @param string $atoms
	 * @return multitype:\Communiverse\Genesis\Atoms\Atom
	 */
	public function get($atoms) {
		if(defined("self::".strtoupper($atoms))) {
			return $this->define($atoms);
		}
	
		return $this->define(self::HELIUM);
	}
	
	/**
	 * 
	 * @param string $atoms
	 * @return multitype:\Communiverse\Genesis\Atoms\Atom
	 */
	private function define($atoms) {
		if(!array_key_exists($atoms, $this->atoms)) {
			$class = __NAMESPACE__ ."\\".$atoms;
			$this->atoms[$atoms] = new $class($this->proton, $this->electron, $this->neutron, $this->sc);
		}
	
		return $this->atoms[$atoms];
	}
	
}

?>