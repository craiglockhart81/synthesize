<?php
/**
*	File Containing the Object Object class.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Type;

use Craiglockhart81\Synthesize\Type\Type;
use Craiglockhart81\Synthesize\Exception\ClassException;
use Craiglockhart81\Synthesize\Exception\TypeException;

/**
*	Object Object Class
*
*	An object data class.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class ObjectObject extends Type {

	/**
	*	Setup Method
	*
	*	Called after the object is created by the TypeFactory to finish any setup required.
	*	@return void
	*/
	public function setup():void {
		if(($this->hasOption('autoinit') && $this->options()->autoinit) && ($this->hasOption('class') || $this->hasOption('default'))){
			$strClass = $this->hasOption('class') ? $this->options()->class : $this->options()->default;
			$this->setValue(new $strClass);
		}
	}

	/**
	*	Set Value Method
	*
	*	Sets the value for the property.
	*	@param mixed $mixValue The value to check.
	*	@throws TypeException if valud is not valid.
	*	@return bool
	*/
	public function setValue($mixValue):bool {
		if(!$this->isValid($mixValue)){
			if($this->hasOption('class')){
				$strClass = $this->options()->class;

				try {
					$mixValue = new $strClass($mixValue);
				}catch (\Exception $e){
					throw new TypeException($mixValue, get_class($this));
				}
			}
		}

		return parent::setValue($mixValue);
	}

	/**
	*	Is Valid Method
	*
	*	Checks to see if the value is valud for the given data type.
	*	@param mixed $mixValue The value to check.
	*	@return bool
	*/
	public function isValid($mixValue):bool {
		if(is_null($mixValue)){
			return true;
		}

		if(is_object($mixValue)){
			if($this->hasOption('class')){
				$strClass = $this->options()->class;

				if($mixValue instanceof $strClass){
					return true;
				}else{
					throw new ClassException($mixValue, $strClass);
					return false;
				}
			}
			return true;
		}
		return false;
	}

	/**
	*	JSON Serialise Method
	*
	*	Method for the \JsonSerializable Interface.
	*	@return mixed
	*/
	public function jsonSerialize():mixed {
		if(is_object($this->mixValue)){
			$mixJSON = json_encode($this->mixValue);
			if((!is_null($this->mixValue) && $mixJSON!='[]') || ($this->hasOption('jsonnull') && $this->options()->jsonnull)){
				return $this->mixValue;
			}
		}

		return null;
	}
}