<?php
/**
*	File containing the Synthesize Option Class.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

namespace Craiglockhart81\Synthesize\Type;

use Craiglockhart81\Synthesize\Type\FixedDictionaryObject;

/**
*	Synthesize Option Class
*
*	A fixed dictionary data type to hold the synthesize options in.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class SynthesizeOption extends FixedDictionaryObject {

	/**
	*	@var array $arrKeys The allowed keys.
	*/
	protected $arrKeys = array(
		'type',
		'default',
		'min',
		'max',
		'format',
		'class',
		'json',
		'jsonnull',
		//'readonly',
		'autoinit'
	);

	/**
	*	@var array $arrDefaults The default values.
	*/
	protected $arrDefaults = array(
		'type' => 'id',
		'default' => null,
		'min' => null,
		'max' => null,
		'format' => null,
		'class' => null,
		'json' => true,
		'jsonnull' => false,
		//'readonly' => false,
		'autoinit' => true
	);
}