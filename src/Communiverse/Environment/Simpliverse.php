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

use Communiverse\Tools\Timer;
use Communiverse\Tools\TimePerFrame;
use Communiverse\Environment\Influence\InputManager;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 18.09.2015
 * @namespace Communiverse\Environment
 * @package Communiverse\Environment
 *
 */
class Simpliverse implements Creator {
	
	/**
	 *
	 * @var boolean
	 */
	protected $running;
	
	/**
	 *
	 * @var float
	 */
	protected $speed;
	
	/**
	 *
	 * @var boolean
	 */
	protected $paused;
	
	/**
	 * 
	 * @var InputManager
	 */
	protected $inputManager;
	

	/**
	 * 
	 * @param InputManager $inputManager
	 */
	public function __construct(InputManager $inputManager) {
		$this->running = false;
		$this->paused = false;
		$this->speed = 1.0;
		$this->inputManager = $inputManager;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Creator::init()
	 */
	public function init() {
		echo "initialised" . PHP_EOL;
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Creator::run()
	 */
	public function run() {
		$this->running = true;
		
		$timer = new Timer();
		
		while($this->running) {
			$tpf = new TimePerFrame();
			do {
				$timer->start();
		
				$this->update($tpf->getFrame());
		
				$timer->adjust();
			} while($tpf->hasFramesLeft($this->speed));
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Creator::update()
	 */
	public function update($tpf) {
		echo $tpf . PHP_EOL;
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Creator::pause()
	 */
	public function pause() {
		$this->paused = !$this->paused;
		if($this->paused) {
			$this->speed = 1.0;
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Creator::speedUp()
	 */
	public function speedUp() {
		$this->speed += 0.1;
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Creator::speedDown()
	 */
	public function speedDown() {
		$this->speed -= 0.1;
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Creator::stop()
	 */
	public function stop() {
		$this->running = false;
	}
	
}

?>