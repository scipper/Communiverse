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
use Communiverse\Tools\Render\Renderer;

/**
 * 
 * @author Steffen Kowalski <scipper@myscipper.de>
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
	 * @var Renderer
	 */
	protected $renderer;
	

	/**
	 * 
	 * @param InputManager $inputManager
	 */
	public function __construct(InputManager $inputManager, Timer $timer, Renderer $renderer) {
		$this->running = false;
		$this->speed = 1.0;
		$this->paused = false;
		$this->inputManager = $inputManager;
		$this->timer = $timer;
		$this->starttime = new \DateTime("now");
		$this->runtime = 0.0;
		$this->endtime = new \DateTime("now");
		$this->renderer = $renderer;
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
			}	
		);
		
		$this->inputManager->addMapping(
			new StdInKeys(StdInKeys::KEY_DOWN),
			function() {
				$this->speedDown();
			}	
		);
		
		$this->inputManager->addMapping(
			new StdInKeys(StdInKeys::KEY_P),
			function() {
				$this->pause();
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
		
		//$this->renderer->clear();
		
		if(!$this->paused) {
			$this->runtime += $tpf * $this->speed;
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Creator::pause()
	 */
	public function pause() {
		$this->paused = !$this->paused;
		if($this->paused) {
			$this->speed = 1.0;
			echo "\npaused" . PHP_EOL;
		} else {
			echo "\nunpaused" . PHP_EOL;
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Creator::speedUp()
	 */
	public function speedUp() {
		$this->speed += 0.1;
		echo "\nspeed up. speed is now " . $this->speed . PHP_EOL;
	}

	/**
	 * (non-PHPdoc)
	 * @see \Communiverse\Environment\Creator::speedDown()
	 */
	public function speedDown() {
// 		if($this->speed > 1) {
			$this->speed -= 0.1;
// 		}
		echo "\nspeed down. speed is now " . $this->speed . PHP_EOL;
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
