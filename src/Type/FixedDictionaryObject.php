<?php
/**
*	File containing the Fixed Dictionary Object class.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Type;

use Craiglockhart81\Synthesize\Type\DictionaryObject;

/**
*	Fixed Dictionary Object Class
*
*	An abstract data type for a fixed dictionaries.
*
*	@package	Craiglockhart81\Synthesize
*
*/
abstract class FixedDictionaryObject extends DictionaryObject {

	/**
	*	@var array $arrKeys The allowed keys.
	*/
	protected $arrKeys = array();

	/**
	*	@var array $arrDefaults The default values.
	*/
	protected $arrDefaults = array();

	/**
	*	Class Constructore
	*
	*	@param array $arrDictionary The array of values for the dictionary.
	*	@return self
	*/
	public function __construct(Array $arrDictionary = array()){
		$this->replace($arrDictionary);
	}

	/**
	*	Replace Method
	*
	*	Replaces all the values in the dictionary.
	*	@param array $arrDictionary The array of values for the dictionary.
	*	@return void
	*/
	public function replace(Array $arrDictionary):void{
		$this->setValue(array());

		foreach($this->arrKeys as $strKey){
			if(isset($arrDictionary[$strKey])){
				$mixValue = $arrDictionary[$strKey];
			}else{
				$mixValue = $this->arrDefaults[$strKey];
			}
			parent::set($strKey, $mixValue);
		}
		$this->updateKeys();
	}

	/**
	*	Set Method
	*
	*	Sets the value for the given key.
	*	@param string $strKey The key name.
	*	@param mixed $mixValue The value to set.
	*	@return void
	*/
	public function set($strKey, $mixValue):void{
		if($this->has($strKey)){
			$this->getValue()[$strKey] = $mixValue;
			$this->updateKeys();
		}else{
			throw new \Exception();
		}
	}
}