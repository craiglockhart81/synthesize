<?php
/**
*	File Containing the String Object class.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Type;

use Craiglockhart81\Synthesize\Type\Type;
use Craiglockhart81\Synthesize\Exception\LengthException;

/**
*	String Object Class
*
*	A string data class.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class StringObject extends Type {

	/**
	*	Is Valid Method
	*
	*	Checks to see if the value is valud for the given data type.
	*	@param mixed $mixValue The value to check.
	*	@return bool
	*/
	public function isValid($mixValue):bool {
		if(is_string($mixValue)){
			if($this->hasOption('min')){
				if(mb_strlen($mixValue)<$this->options()->min){
					throw new LengthException($mixValue, $this->options()->min, $this->options()->max);
					return false;
				}
			}
			if($this->hasOption('max')){
				if(mb_strlen($mixValue)>$this->options()->max){
					throw new LengthException($mixValue, $this->options()->min, $this->options()->max);
					return false;
				}
			}
			return true;
		}
		return false;
	}
}