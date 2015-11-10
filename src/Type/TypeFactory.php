<?php
/**
*	This file contains the Type Factory Class.
*
*	@package	Frozensheep\Synthesize
*	@author		Jacob Wyke <jacob@frozensheep.com>
*	@license	MIT
*
*/

namespace Frozensheep\Synthesize\Type;

use Frozensheep\Synthesize\Type\SynthesizeOption;
use Frozensheep\Synthesize\Exception\UnknownTypeException;

/**
*	Type Factory Class
*
*	Class build the different synthesize types.
*
*	@package	Frozensheep\Synthesize
*
*/
class TypeFactory {

	/**
	*	Create Method
	*
	*	Returns a type object based on the options given.
	*	@param Frozensheep\Synthesize\Type\SynthesizeOption $objOptions The options object.
	*	return object The object for the type created.
	*/
	static public function create(SynthesizeOption $objOptions){
		$strType = 'Frozensheep\\Synthesize\\Type\\'.$objOptions->type;
		if(!class_exists($strType)){
			throw new UnknownTypeException($strType);
		}

		$objObject = new $strType();
		$objObject->setOptions($objOptions);
		return $objObject;
	}
}