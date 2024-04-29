<?php
/**
*	This file contains the Invalid JSON Exception Class.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Exception;

/**
*	Invalid JSON Exception Class
*
*	Exception for attempting to decode a bad JSON string.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class InvalidJSONException extends \RuntimeException {

	/**
	*	Constructor
	*
	*	@param string $strType The object type that was requested, but is unknown.
	*	@return self
	*/
    public function __construct($strJSON){
        parent::__construct(sprintf('Invalid JSON string: %s', $strJSON));
    }
}