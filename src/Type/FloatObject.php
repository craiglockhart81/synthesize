<?php
/**
*	File Containing the Float Object class.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Type;

use Craiglockhart81\Synthesize\Type\Type;
use Craiglockhart81\Synthesize\Exception\RangeException;

/**
*	Float Object Class
*
*	A float data class.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class FloatObject extends Type {

	/**
	*	Is Valid Method
	*
	*	Checks to see if the value is valud for the given data type.
	*	@param mixed $mixValue The value to check.
	*	@return bool
	*/
	public function isValid($mixValue):bool {
		if(is_float($mixValue)){
			if($this->hasOption('min')){
				if($mixValue<$this->options()->min){
					throw new RangeException($mixValue, $this->options()->min, $this->options()->max);
					return false;
				}
			}
			if($this->hasOption('max')){
				if($mixValue>$this->options()->max){
					throw new RangeException($mixValue, $this->options()->min, $this->options()->max);
					return false;
				}
			}
			return true;
		}
		return false;
	}
}