<?php
/**
*	File Containing the Boolean Object class.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Type;

use Craiglockhart81\Synthesize\Type\Type;

/**
*	Boolean Object Class
*
*	A boolean data class.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class BooleanObject extends Type {

	/**
	*	Is Valid Method
	*
	*	Checks to see if the value is valud for the given data type.
	*	@param mixed $mixValue The value to check.
	*	@return bool
	*/
	public function isValid($mixValue):bool {
		if(is_bool($mixValue)){
			return true;
		}
		return false;
	}
}