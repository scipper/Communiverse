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

/**
 * 
 * @author Steffen Kowalski <scipper@myscipper.de>
 *
 * @since 19.09.2015
 * @namespace Communiverse\Environment\Influence
 * @package Communiverse\Environment\Influence
 *
 */
class StdEventListener implements InputEventListener {
	
	/**
	 * 
	 * @var KeyMapper
	 */
	protected $key;
	
	/**
	 * 
	 * @var array
	 */
	protected $read;
	
	/**
	 * 
	 * @var array
	 */
	protected $write;
	
	/**
	 * 
	 * @var array
	 */
	protected $except;
	
	/**
	 * 
	 * @var integer
	 */
	protected $streamSelectResult;
	

	/**
	 *
	 */
	public function __construct() {
		stream_set_blocking(STDIN, 0);
		readline_callback_handler_install('', function() { });
	}
	
	/**
	 * 
	 * @return boolean
	 */
	public function listen() {
		$this->read = array(STDIN);
		$this->write = NULL;
		$this->except = NULL;
		$this->streamSelectResult = stream_select($this->read, $this->write, $this->except, 0);
		if($this->streamSelectResult && in_array(STDIN, $this->read)) {
			$c = stream_get_contents(STDIN, 1024);
			$value = unpack('H*', strtolower($c));
		
			$this->setKey(new StdInKeys($value[1]));
			
			return true;
		}
		
		return false;
	}
	
	/**
	 * 
	 * @param KeyMapper $key
	 */
	public function setKey(KeyMapper $key) {
		$this->key = $key;
	}
	
	/**
	 * 
	 * @return integer
	 */
	public function getKey() {
		return $this->key;
	}
	
	/**
	 * 
	 */
	public function reset() {
		$this->key = NULL;
	}
	
}

?>