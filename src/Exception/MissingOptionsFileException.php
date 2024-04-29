<?php
/**
*	This file contains the Missing Options File Exception Class.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Exception;

/**
*	Missing Options File Exception Class
*
*	Exception for attempting to access a JSON options file that doesnt exist.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class MissingOptionsFileException extends \RuntimeException {

	/**
	*	Constructor
	*
	*	@param string $strFileName The file name we could not find.
	*	@return self
	*/
    public function __construct($strFileName){
        parent::__construct(sprintf('Unable to find JSON options file \'%s\'.', $strFileName));
    }
}