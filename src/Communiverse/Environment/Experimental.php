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
/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 19.09.2015
 * @namespace Communiverse\Environment
 * @package Communiverse\Environment
 *
 */
class Experimental extends Simpliverse {
	
	/**
	 * 
	 * @var float
	 */
	protected $time;
	
	
	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Simpliverse::init()
	 */
	public function init() {
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
		$this->time += $tpf * $this->speed;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Simpliverse::render()
	 */
	public function render($tpf) {
		echo number_format($this->time, 1) . " s\r";		
	}
	
	/**
	 * 
	 */
	public function massSpeedUp() {
		$this->speed = 31536000;
	}
	
}

?>