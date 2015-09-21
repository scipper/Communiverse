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

namespace Communiverse\Tools;

/**
 * 
 * @author Steffen Kowalski <scipper@myscipper.de>
 *
 * @since 20.09.2015
 * @namespace Communiverse\Tools
 * @package Communiverse\Tools
 *
 */
class Memory {
	
	/**
	 * 
	 * @param float $size
	 * @return string
	 */
	public function convert($size) {
		$size = (float) $size;
    	$unit = array(
			'b',
			'kb',
			'mb',
			'gb',
			'tb',
			'pb');
		return @round(
			$size / pow(1024, ($i = floor(log($size,1024)))),2)
			.' '.$unit[$i];
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getUsage() {
		return $this->convert(memory_get_usage(true));
	}
	
}

?>