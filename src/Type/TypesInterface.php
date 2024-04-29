<?php
/**
*	This file contains the Types interface.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Type;

/**
*	Types Interface
*
*	The Interface for all data types used in the synthesize process.
*	@package	Craiglockhart81\Synthesize
*
*/
interface TypesInterface {

	/**
	*	Setup Method
	*
	*	Called after the object is created by the TypeFactory to finish any setup required.
	*	@return void
	*/
	public function setup();

	/**
	*	As Value Method
	*
	*	Returns the value of the object.
	*	@return mixed
	*/
	public function asValue();

	/**
	*	As Object Method
	*
	*	Returns the object.
	*	@return object
	*/
	public function asObject();

	/**
	*	Set Value Method
	*
	*	Sets the value for the property.
	*	@param mixed $mixValue The value to check.
	*	@return bool
	*/
	public function setValue($mixValue);

	/**
	*	Is Valid Method
	*
	*	Checks to see if the value is valud for the given data type.
	*	@param mixed $mixValue The value to check.
	*	@return bool
	*/
	public function isValid($mixValue);
}