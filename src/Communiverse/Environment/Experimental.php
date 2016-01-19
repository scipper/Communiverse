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

namespace Communiverse\Environment;

use Communiverse\Environment\Influence\StdInKeys;
use Communiverse\Tools\Colorizer;
use Communiverse\Genesis\Maths\Vector3;
use Communiverse\Genesis\Physics\Units\UnitCollection;
use Communiverse\Genesis\Physics\Units\SI\SIUnitCollection;
use Communiverse\Genesis\Physics\Number;
use Communiverse\Genesis\Physics\Calculator;
use Communiverse\Genesis\Atoms\AtomCollection;
use Communiverse\Genesis\Atoms\Particles\Proton;
use Communiverse\Genesis\Atoms\Particles\Electron;
use Communiverse\Genesis\Atoms\Particles\Neutron;
use Communiverse\Genesis\Atoms\Series\SeriesCollection;
use Communiverse\Tools\Memory;
use Communiverse\Genesis\Maths\Math;

/**
 * 
 * @author Steffen Kowalski <scipper@myscipper.de>
 *
 * @since 19.09.2015
 * @namespace Communiverse\Environment
 * @package Communiverse\Environment
 *
 */
class Experimental extends Simpliverse {
	
	/**
	 * 
	 * @var Colorizer
	 */
	protected $colorizer;
	
	/**
	 * 
	 * @var AtomCollection
	 */
	protected $ac;
	
	/**
	 * 
	 * @var UnitCollection
	 */
	protected $uc;
	
	/**
	 * 
	 * @var Memory
	 */
	protected $mem;
	
	/**
	 * 
	 * @var Vector3
	 */
	protected $vec;
	
	/**
	 * 
	 * @var Vector3
	 */
	protected $rvec;
	
	/**
	 * 
	 * @var float
	 */
	protected $angle;
	
	/**
	 * 
	 * @var integer
	 */
	protected $vsize;
	
	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Simpliverse::init()
	 */
	public function init() {
		system("clear");
		
		$this->mem = new Memory();
		$this->colorizer = new Colorizer();
		$this->vsize = 10;
		$this->vec = new Vector3($this->vsize, 0, 0);
		
		$this->printStarChart();
		
		echo "memory usage: " . $this->mem->getUsage() . PHP_EOL; 
		
		$this->loadCollections();
 		$this->generateParticles();
		
		echo "memory usage: " . $this->mem->getUsage() . PHP_EOL;
		
		$this->inputManager->addMapping(
			new StdInKeys(StdInKeys::KEY_M),
			function() {
				$this->massSpeedUp();
				echo "\nwarp speed activated!" . PHP_EOL;
			}	
		);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Simpliverse::update()
	 */
	public function update($tpf) {
return;
		$this->angle += M_PI * $tpf * $this->speed;
		$this->rvec = $this->vec->rotateAngleAxis(
			Math::degreeToRadian($this->angle), 
			Vector3::AXIS_Z
		);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Simpliverse::render()
	 */
	public function render($tpf) {
		return;
		$x = intval($this->rvec->getX());
		if($x > $this->vsize) {
			$x = $this->vsize;
		} elseif($x < -$this->vsize) {
			$x = -$this->vsize;
		}
		$y = intval($this->rvec->getY());
		if($y > $this->vsize) {
			$y = $this->vsize;
		} elseif($y < -$this->vsize) {
			$y = -$this->vsize;
		}
// 		echo number_format($this->runtime, 1) . " s (time travelled in years: " . number_format(($this->runtime / 31536000), 2) . ")\r";
		for($i = -($this->vsize+2); $i <= $this->vsize+2; $i++) {
			for($j = -($this->vsize+2); $j <= $this->vsize+2; $j++) {
				if($i == $x && $j == $y) {
					echo "o ";
					continue;
				}
				if($i == 0 || $i == ($this->vsize+3)) {
					echo "_ ";
				} elseif($j == 0 || $j == ($this->vsize+3)) {
					echo "|";
				} else {
					echo "  ";
					continue;
				}
			}
			
			echo PHP_EOL;
		}
		echo $this->rvec->getX() . PHP_EOL;
		echo $this->angle . PHP_EOL;
// 		echo $this->vec->getX() . " : " . $this->vec->getY() . " : " . $this->vec->getZ() . PHP_EOL;
	}
	
	/**
	 * 
	 */
	public function massSpeedUp() {
		if($this->speed > 0) {
			$this->speed += 31536000;
		} else {
			$this->speed -= 31536000;
		}	
	}
	
	/**
	 * 
	 */
	public function printStarChart() {
		for($i = 0; $i < 10000; $i++) {
			if($i == 5000) {
				echo $this->colorizer->getColoredString("✈", Colorizer::FG_LIGHT_GREEN, Colorizer::BG_BLACK);
			} elseif($i == 7000) {
				echo $this->colorizer->getColoredString("ං", Colorizer::FG_GREEN, Colorizer::BG_BLACK);
			} elseif(rand() % 15 == 0) {
				if(rand() % 9 == 0) {
					echo $this->colorizer->getColoredString(".", Colorizer::FG_BLUE, Colorizer::BG_BLACK);
				} else {
					echo $this->colorizer->getColoredString(".", NULL, Colorizer::BG_BLACK);
				}
			} elseif(rand() % 125 == 0) {
				if(rand() % 7 == 0) {
					echo $this->colorizer->getColoredString("⭑", Colorizer::FG_LIGHT_BLUE, Colorizer::BG_BLACK);
				} elseif(rand() % 5 == 0) {
					echo $this->colorizer->getColoredString("✶", Colorizer::FG_RED, Colorizer::BG_BLACK);
				} else {
					echo $this->colorizer->getColoredString("☀", Colorizer::FG_YELLOW, Colorizer::BG_BLACK);
				}
				
			} else {
				echo $this->colorizer->getColoredString(" ", NULL, Colorizer::BG_BLACK);
			}
		}
		echo PHP_EOL;
	}
	
	/**
	 * 
	 */
	public function loadCollections() {
		$this->ac = new AtomCollection(
			new Proton(),
			new Electron(),
			new Neutron(),
			new SeriesCollection()
		);
		
		$this->uc = new UnitCollection(
			new SIUnitCollection()
		);
	}
	
	/**
	 * 
	 */
	public function generateParticles() {
		$particles = array();
		$size = 100;
		$counter = 0;
		$percent = 0;
		for($z = 0; $z < $size; $z++) {
			for($y = 0; $y < $size; $y++) {
				for($x = 0; $x < $size; $x++) {
					$particles[$z][$y][$x] = $this->ac->get(AtomCollection::HYDROGEN);
					
					$counter++;
					if($counter % (pow($size, 3) / 100) == 0) {
						$percent += 1;
						echo "particle generation completet: " . $percent . " %\r";
					}
				}
			}
		}
		echo PHP_EOL;
	}
	
}

?>
