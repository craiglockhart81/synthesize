<?php
/**
*	This file contains the Missing Option Exception Class.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Exception;

/**
*	Missing Option Exception Class
*
*	Exception for a missing required option.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class MissingOptionException extends \RuntimeException {

	/**
	*	Constructor
	*
	*	@param string $strOption The missing option.
	*	@return self
	*/
    public function __construct($strOption){
        parent::__construct(sprintf('Missing the required option \'%s\'.', $strOption));
    }
}