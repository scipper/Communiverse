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
 * @author Steffen Kowalski <sk@traiwi.de>
 *
 * @since 20.09.2015
 * @namespace Communiverse\Tools
 * @package Communiverse\Tools
 *
 */
class Colorizer {
	
	const FG_BLACK = "0;30";
	const FG_DARK_GRAY = "1;30";
	const FG_BLUE = "0;34";
	const FG_LIGHT_BLUE = "1;34";
	const FG_GREEN = "0;32";
	const FG_LIGHT_GREEN = "1;32";
	const FG_CYAN = "0;36";
	const FG_LIGHT_CYAN = "1;36";
	const FG_RED = "0;31";
	const FG_LIGHT_RED = "1;31";
	const FG_PURPLE = "0;35";
	const FG_LIGHT_PURPLE = "1;35";
	const FG_BROWN = "0;33";
	const FG_YELLOW = "1;33";
	const FG_LIGHT_GRAY = "0;37";
	const FG_WHITE = "1;37";

	const BG_BLACK = "40";
	const BG_RED = "41";
	const BG_GREEN = "42";
	const BG_YELLOW = "43";
	const BG_BLUE = "44";
	const BG_MAGENTA = "45";
	const BG_CYAN = "46";
	const BG_LIGHT_GRAY = "47";
	
	
	/**
	 * 
	 * @param string $string
	 * @param string $fgColor
	 * @param string $bgColor
	 * @return string
	 */
	public function getColoredString($string, $fgColor = NULL, $bgColor = NULL) {
		$coloredString = "";
		$fgConst = $this->getConstName($fgColor);
		if(!is_null($fgConst)) {
			$coloredString .= "\033[" . constant("self::" . $fgConst) . "m";
		}
		
		$bgConst = $this->getConstName($bgColor);
		if(!is_null($bgConst)) {
			$coloredString .= "\033[" . constant("self::" . $bgConst) . "m";
		}
		
		$coloredString .=  $string . "\033[0m";
		
		return $coloredString;
	}
	
	/**
	 * 
	 * @param string $search
	 * @return string|NULL
	 */
	public function getConstName($search) {
		$class = new \ReflectionClass(__CLASS__);
		$constants = $class->getConstants();
		
		$constName = NULL;
		foreach($constants as $name => $value) {
			if($value == $search) {
				$constName = $name;
				break;
			}
		}
		
		return $constName;
	}
}

?>