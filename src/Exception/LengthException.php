<?php
/**
*	This file contains the Length Exception Class.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Exception;

/**
*	Length Exception Class
*
*	Exception for an issue with the length of a string.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class LengthException extends \RuntimeException {

	/**
	*	Constructor
	*
	*	@param string $strString The string.
	*	@param mixed $mixMin The minimum string length.
	*	@param mixed $mixMax The maximum string length.
	*	@return self
	*/
	public function __construct($strString, $mixMin, $mixMax){
		parent::__construct(sprintf('The string "%s" has a length outside the allowed limits of %d -> %d', $strString, $mixMin, $mixMax));
	}
}