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

/**
 * 
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 20.09.2015
 *
 */
class Classloader {

	/**
	 * 
	 * @var string
	 */
	private $include_path;
	
	/**
	 * 
	 * @var string
	 */
	private $dir_separator;
	
	/**
	 * 
	 * @var string
	 */
	private $file_extension;
	
	/**
	 * 
	 * @param string $include_path
	 * @param string $dir_separator
	 * @param string $file_extension
	 */
	public function __construct($include_path = null, $dir_separator = DIRECTORY_SEPARATOR, $file_extension = ".php") {
		$this->include_path = $include_path;
		$this->dir_separator = $dir_separator;
		$this->file_extension = $file_extension;
	}
	
	/**
	 * 
	 */
	public function register() {
		spl_autoload_register(array($this, 'autoload'));
	}
	
	/**
	 * 
	 */
	public function unregister() {
		spl_autoload_unregister(array($this, 'autoload'));
	}

	/**
	 * 
	 * @param string $class
	 * @return boolean
	 */
	public function autoload($class) {
		$class = str_replace("\\", $this->dir_separator, $class);
		$file = $this->include_path.$this->dir_separator.$class.$this->file_extension;
		if(is_readable($file)) {
			require_once $file;
			return true;
		}
		return false;
	}

}

?>