<?php
/**
*	This file contains the Max Exception Class.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Exception;

/**
*	Max Exception Class
*
*	Exception for a value outside of the maxed allowed.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class MaxException extends \RuntimeException {

	/**
	*	Constructor
	*
	*	@param mixed $mixMax The maximum value.
	*	@return self
	*/
	public function __construct($mixMax){
		parent::__construct(sprintf('The maximum number of items is "%d".', $mixMax));
	}
}