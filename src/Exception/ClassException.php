<?php
/**
*	This file contains the Class Exception Class.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Exception;

/**
*	Class Exception Class
*
*	Exception for an issue with an incorrect class.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class ClassException extends \RuntimeException {

	/**
	*	Constructor
	*
	*	@param object $objClass The object that you passed.
	*	@param string $strExpected The expected class type.
	*	@return self
	*/
	public function __construct($objClass, $strExpected){
		parent::__construct(sprintf('Incorrect class type "%s", expected "%s"', get_class($objClass), $strExpected));
	}
}