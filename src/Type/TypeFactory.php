<?php
/**
*	This file contains the Type Factory Class.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Type;

use Craiglockhart81\Synthesize\Type\SynthesizeOption;
use Craiglockhart81\Synthesize\Exception\UnknownTypeException;

/**
*	Type Factory Class
*
*	Class build the different synthesize types.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class TypeFactory {

	/**
	*	Create Method
	*
	*	Returns a type object based on the options given.
	*	@param Craiglockhart81\Synthesize\Type\SynthesizeOption $objOptions The options object.
	*	return object The object for the type created.
	*/
	static public function create(SynthesizeOption $objOptions){
		$strType = TypeFactory::getType($objOptions->type);
		if(!class_exists($strType)){
			throw new UnknownTypeException($strType);
		}

		$objObject = new $strType(null, $objOptions);
		return $objObject;
	}

	/**
	*	Get Type Method
	*
	*	Returns a type object based on the options given.
	*	@param string $strType The name of the type.
	*	return string
	*/
	static public function getType($strType){
		//convert reserved names to the actual objects
		$arrReservere = array(
			'array' => 'ArrayObject',
			'bool' => 'BooleanObject',
			'boolean' => 'BooleanObject',
			'datetime' => 'DateTimeObject',
			'dictionary' => 'DictionaryObject',
			'enum' => 'EnumObject',
			'id' => 'IdObject',
			'int' => 'IntObject',
			'float' => 'FloatObject',
			'string' => 'StringObject',
			'resource' => 'ResourceObject',
			'object' => 'ObjectObject',
			'objectarray' => 'ObjectArrayObject',
			'number' => 'NumberObject',
			'numeric' => 'NumberObject',
			'fixeddictionary' => 'FixedDictionaryObject'
		);

		if(array_key_exists(strtolower($strType), $arrReservere)){
			$strType = $arrReservere[strtolower($strType)];
		}

		$strType = 'Craiglockhart81\\Synthesize\\Type\\'.ucfirst($strType);

		return $strType;
	}
}