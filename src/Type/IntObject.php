<?php
/**
*	File Containing the Int Object class.
*
*	@package	Frozensheep\Synthesize
*	@author		Jacob Wyke <jacob@frozensheep.com>
*	@license	MIT
*
*/

namespace Frozensheep\Synthesize\Type;

use Frozensheep\Synthesize\Type\Type;
use Frozensheep\Synthesize\Exception\RangeException;

/**
*	Int Object Class
*
*	An int data class.
*
*	@package	Frozensheep\Synthesize
*
*/
class IntObject extends Type {

	/**
	*	Is Valid Method
	*
	*	Checks to see if the value is valud for the given data type.
	*	@param mixed $mixValue The value to check.
	*	@return bool
	*/
	public function isValid($mixValue):bool {
		if(is_int($mixValue)){
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