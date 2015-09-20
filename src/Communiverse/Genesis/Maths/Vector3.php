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

namespace Communiverse\Genesis\Maths;

/**
 * 
 * @author Steffen Kowalski <scipper@myscipper.de>
 *
 * @since 20.09.2015
 * @namespace Communiverse\Genesis\Maths
 * @package Communiverse\Genesis\Maths
 *
 */
class Vector3 {
	
	const AXIS_X = 0;
	const AXIS_Y = 1;
	const AXIS_Z = 2;
	
	/**
	 * 
	 * @var float
	 */
	protected $x;
	
	/**
	 * 
	 * @var float
	 */
	protected $y;
	
	/**
	 * 
	 * @var float
	 */
	protected $z;
	
	
	/**
	 * 
	 * @param float $x
	 * @param float $y
	 * @param float $z
	 */
	public function __construct($x, $y, $z) {
		$this->x = (float) $x;
		$this->y = (float) $y;
		$this->z = (float) $z;
	}
	
	/**
	 * 
	 * @return float
	 */
	public function getX() {
		return number_format($this->x, 1);
	}
	
	/**
	 * 
	 * @return float
	 */
	public function getY() {
		return number_format($this->y, 1);
	}
	
	/**
	 * 
	 * @return float
	 */
	public function getZ() {
		return number_format($this->z, 1);
	}

	/**
	 * 
	 * @param Vector3 $b
	 * @return \Communiverse\Genesis\Maths\Vector3
	 */
	public function add(Vector3 $b) {
		return new Vector3(
			$this->getX() + $b->getX(),
			$this->getY() + $b->getY(),
			$this->getZ() + $b->getZ()	
		);
	}
	
	/**
	 * 
	 * @param Vector3 $b
	 * @return \Communiverse\Genesis\Maths\Vector3
	 */
	public function subtract(Vector3 $b) {
		return new Vector3(
			$this->getX() - $b->getX(),
			$this->getY() - $b->getY(),
			$this->getZ() - $b->getZ()	
		);
	}
	
	/**
	 * 
	 * @param float $v
	 * @return \Communiverse\Genesis\Maths\Vector3f
	 */
	public function multiply($v) {
		return new Vector3f(
			$this->getX() * $v,
			$this->getY() * $v,
			$this->getZ() * $v
		);
	}
	
	/**
	 * 
	 * @return float
	 */
	public function absolute() {
		return sqrt(
			pow($this->getX(), 2) + 
			pow($this->getY(), 2) + 
			pow($this->getZ(), 2)		
		);
	}
	
	/**
	 * 
	 * @param Vector3 $b
	 * @return float
	 */
	public function scalarproduct(Vector3 $b) {
		return $this->getX() * $b->getX() + 
			$this->getY() * $b->getY() +
			$this->getZ() * $b->getZ();
	}
	
	/**
	 * 
	 * @param Vector3 $b
	 * @return float
	 */
	public function angleBetween(Vector3 $b) {
		return acos(
			($this->scalarproduct($b)) /
			($this->absolute() * $b->absolute())		
		) * 180 / M_PI;
	}
	
	/**
	 * 
	 * @param Vector3 $b
	 * @return \Communiverse\Genesis\Maths\Vector3
	 */
	public function vectorProduct(Vector3 $b) {
		return new Vector3(
			$this->getY() * $b->getZ() - $this->getZ() * $b->getY(),
			$this->getZ() * $b->getX() - $this->getX() * $b->getZ(),
			$this->getX() * $b->getY() - $this->getY() * $b->getX()
		);
	}
	
	/**
	 * 
	 * @param float $angle
	 * @param integer $axis
	 * @return \Communiverse\Genesis\Maths\Vector3
	 */
	public function rotateAngleAxis($angle, $axis) {
		switch($axis) {
			case Vector3::AXIS_X: {
				return $this->rotateAroundX($angle);
			} break;
			case Vector3::AXIS_Y: {
				return $this->rotateAroundY($angle);
			} break;
			case Vector3::AXIS_Z: {
				return $this->rotateAroundZ($angle);
			} break;
		}
	}
	
	/**
	 * 
	 * @param float $angle
	 * @return \Communiverse\Genesis\Maths\Vector3
	 */
	public function rotateAroundX($angle) {
		return new Vector3(
			$this->getX(),
			$this->getY() + cos($angle) * (0 - $this->getY()) - sin($angle) * (0 - $this->getZ()),
			$this->getZ() + sin($angle) * (0 - $this->getY()) + cos($angle) * (0 - $this->getZ())
		);
	}
	
	/**
	 * 
	 * @param float $angle
	 * @return \Communiverse\Genesis\Maths\Vector3
	 */
	public function rotateAroundY($angle) {
		return new Vector3(
			$this->getX() * cos($angle) + $this->getZ() * sin($angle),
			$this->getY(),
			-$this->getX() * sin($angle) + $this->getZ() * cos($angle)
		);
	}
	
	/**
	 * 
	 * @param float $angle
	 * @return \Communiverse\Genesis\Maths\Vector3
	 */
	public function rotateAroundZ($angle) {
		return new Vector3(
			$this->getX() * cos($angle) - $this->getY() * sin($angle),
			$this->getX() * sin($angle) + $this->getY() * cos($angle),
			$this->getZ()
		);
	}
	
	/**
	 * 
	 * @return \Communiverse\Genesis\Maths\Vector3f
	 */
	public function normalize() {
		return $this->multiply(
			1 / $this->absolute()		
		);
	}
	
}

?>