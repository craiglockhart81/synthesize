<?php
/**
*	File containing the Object Array Object class.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Type;

use Craiglockhart81\Synthesize\Type\ArrayObject;
use Craiglockhart81\Synthesize\Exception\MaxException;
use Craiglockhart81\Synthesize\Exception\ClassException;
use Craiglockhart81\Synthesize\Exception\TypeException;
use Craiglockhart81\Synthesize\Exception\MissingOptionException;

/**
*	Object Array Object Class
*
*	An Object Array data type class. Only allows items of the allowed class.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class ObjectArrayObject extends ArrayObject {

	/**
	*	Setup Method
	*
	*	Overwrite the ArrayObject method as we dont allow defaults for this type.
	*	@return void
	*/
	public function setup():void {

	}

	/**
	*	Is Valid Item Method
	*
	*	Checks to see if the value is valid to be stored inside the array.
	*	@param mixed $mixValue The value to check.
	*	@return bool
	*/
	public function isValidItem($mixValue):bool {
		if(is_object($mixValue)){
			if($this->hasOption('max')){
				if(count($this->mixValue)>=$this->options()->max){
					throw new MaxException($this->options()->max);
					return false;
				}
			}

			if($this->hasOption('class')){
				$strClass = $this->options()->class;
				if(!$mixValue instanceof $strClass){
					throw new ClassException($mixValue, $this->options()->class);
					return false;
				}
			}
			return true;
		}
		return false;
	}

	/**
	*	Offset Set Method
	*
	*	Offset Set method for the \ArrayAccess Interface.
	*	@param mixed $mixOffset The array offset/key.
	*	@param mixed $mixValue The value to set.
	*	@return void
	*/
	public function offsetSet($mixOffset, $mixValue):void {
		if(!$this->isValidItem($mixValue)){
			$mixValue = $this->_create($mixValue);
		}

		parent::offsetSet($mixOffset, $mixValue);
	}

	/**
	*	_Create Method
	*
	*	Creates and returns an object.
	*	@param mixed $mixValue Optional value to pass to the contruction of the object.
	*	@return void
	*/
	private function _create($mixValue = null) {
		if($this->hasOption('class')){
			$strClass = $this->options()->class;

			try {
				$objObject = new $strClass($mixValue);
			}catch (\Exception $e){
				throw new TypeException($mixValue, get_class($this));
			}

			return $objObject;
		}

		throw new MissingOptionException('class');
	}

	/**
	*	Create Method
	*
	*	Creates and returns an object.
	*	@param mixed $mixValue Optional value to pass to the contruction of the object.
	*	@return void
	*/
	public function create($mixValue = null){
		$objClass = $this->_create($mixValue);
		$this->offsetSet(null, $objClass);
		return $objClass;
	}
}