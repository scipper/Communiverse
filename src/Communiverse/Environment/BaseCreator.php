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
use Communiverse\Environment\Influence\InputManager;
use Communiverse\Environment\Influence\StdInKeys;
use Communiverse\Environment\Influence\KeyMapper;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 18.09.2015
 * @namespace Communiverse\Environment
 * @package Communiverse\Environment
 *
 */
abstract class BaseCreator implements Creator {
	
	/**
	 *
	 * @var boolean
	 */
	private $running;
	
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
	 * @var Timer
	 */
	protected $timer;
	
	/**
	 * 
	 * @var \DateTime
	 */
	protected $starttime;
	
	/**
	 *
	 * @var float
	 */
	protected $runtime;
	
	/**
	 * 
	 * @var \DateTime
	 */
	protected $endtime;
	

	/**
	 * 
	 * @param InputManager $inputManager
	 */
	public function __construct(InputManager $inputManager, Timer $timer) {
		$this->running = false;
		$this->paused = false;
		$this->speed = 1.0;
		$this->starttime = new \DateTime("now");
		$this->endtime = new \DateTime("now");
		$this->inputManager = $inputManager;
		$this->timer = $timer;
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Creator::coreInit()
	 */
	public function coreInit() {
		$this->inputManager->addMapping(
			new StdInKeys(StdInKeys::KEY_Q),
			function() {
				$this->stop();
			}	
		);
		
		$this->inputManager->addMapping(
			new StdInKeys(StdInKeys::KEY_UP),
			function() {
				$this->speedUp();
				echo "\nspeed up. speed is now " . $this->speed . PHP_EOL;
			}	
		);
		
		$this->inputManager->addMapping(
			new StdInKeys(StdInKeys::KEY_DOWN),
			function() {
				$this->speedDown();
				echo "\nspeed down. speed is now " . $this->speed . PHP_EOL;
			}	
		);
		
		$this->inputManager->addMapping(
			new StdInKeys(StdInKeys::KEY_P),
			function() {
				$this->pause();
				echo "\npause" . PHP_EOL;
			}	
		);
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Creator::run()
	 */
	final public function run() {
		$this->starttime->setTimestamp(time());
		echo "creator started on " . $this->starttime->format("D, d.m.Y, H:i:s") . PHP_EOL;
		
		$this->running = true;
		
		while($this->running) {
			$this->timer->update();
			$this->coreUpdate($this->timer->getElapsed());
	
			$this->timer->adjust();
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Creator::coreUpdate()
	 */
	public function coreUpdate($tpf) {
		$this->inputManager->listen($tpf);
		
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
		$this->speed++;
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Creator::speedDown()
	 */
	public function speedDown() {
		if($this->speed > 1) {
			$this->speed--;
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Creator::stop()
	 */
	public function stop() {
		$this->running = false;
		
		$this->endtime->setTimestamp($this->starttime->getTimestamp() + $this->runtime);
		
		echo "\nend of this creator on " . $this->endtime->format("D, d.m.Y, H:i:s") . PHP_EOL;
	}
	
}

?>