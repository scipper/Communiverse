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

namespace Communiverse\Environment\Influence;

use Communiverse\Tools\Timer;

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 18.09.2015
 * @namespace Communiverse\Environment\Influence
 * @package Communiverse\Environment\Influence
 *
 */
class InputManager {
	
	/**
	 * 
	 * @var array[\Closure]
	 */
	protected $mappings;
	
	/**
	 * 
	 * @var InputEventListener
	 */
	protected $inputEventListener;
	
	
	/**
	 * 
	 */
	public function __construct(InputEventListener $eventListener) {
		$this->mappings = array();
		$this->inputEventListener = $eventListener;
	}

	/**
	 * 
	 * @param KeyMapper $key
	 * @param \Closure $action
	 */
	public function addMapping(KeyMapper $key, \Closure $action) {
		$this->mappings[$key->getKey()] = $action;
	}
	
	/**
	 * 
	 * @param KeyMapper $key
	 */
	public function removeMapping(KeyMapper $key) {
		if($this->mappingExists($key)) {
			unset($this->mappings[$key->getKey()]);
		}
	}
	
	/**
	 * 
	 * @param KeyMapper $key
	 * @return boolean
	 */
	private function mappingExists(KeyMapper $key) {
		return array_key_exists($key->getKey(), $this->mappings);
	}
	
	/**
	 * 
	 * @param KeyMapper $key
	 * @return \Closure
	 */
	private function getMapping(KeyMapper $key) {
		if($this->mappingExists($key)) {
			return $this->mappings[$key->getKey()];
		}
		return NULL;
	}
	
	/**
	 * 
	 * @param float $tpf
	 */
	public function listen($tpf) {
		if($this->inputEventListener->listen() && $this->inputEventListener->getKey() !== null) {
			$this->delegateEvent($this->getMapping($this->inputEventListener->getKey()), $tpf);
		}
	}
	
	/**
	 * 
	 * @param \Closure|NULL $mapping
	 * @param float $tpf
	 */
	private function delegateEvent($mapping, $tpf) {
		if(!is_null($mapping)) {
			$mapping($tpf);
		}
		
		$this->inputEventListener->reset();
	}
	
}

?>