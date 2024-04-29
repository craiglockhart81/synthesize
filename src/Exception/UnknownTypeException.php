<?php
/**
*	This file contains the Unknown Type Exception Class.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Exception;

/**
*	Unknown Type Exception Class
*
*	Exception for attempting to create an unknown synthesize object type.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class UnknownTypeException extends \RuntimeException {

	/**
	*	Constructor
	*
	*	@param string $strType The object type that was requested, but is unknown.
	*	@return self
	*/
    public function __construct($strType){
        parent::__construct(sprintf('Unknown type of: %s', $strType));
    }
}