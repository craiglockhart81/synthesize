<?php
/**
*	This file contains the Range Exception Class.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Exception;

/**
*	Range Exception Class
*
*	Exception for a value outside of the allowed range.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class RangeException extends \RuntimeException {

	/**
	*	Constructor
	*
	*	@param mixed $mixValue The value.
	*	@param mixed $mixMin The minimum value.
	*	@param mixed $mixMax The maximum value.
	*	@return self
	*/
	public function __construct($mixValue, $mixMin, $mixMax){
		parent::__construct(sprintf('The value "%s" is outside of the allowed range of %d -> %d', $mixValue, $mixMin, $mixMax));
	}
}