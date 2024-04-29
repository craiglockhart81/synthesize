<?php

namespace Craiglockhart81\Synthesize\Tests\Type\Fixtures;

use Craiglockhart81\Synthesize\Synthesizer;

class BooleanFixture implements \JsonSerializable {

	//include the Sythesizer trait
	use Synthesizer;

	//set the synthesized variables
	protected $arrSynthesize = array(
		'boolean' => array('type' => 'boolean'),
		'boolean1' => array('type' => 'boolean'),
		'boolean2' => array('type' => 'boolean', 'default' => true),
		'boolean4' => array('type' => 'boolean', 'jsonnull' => true),
		'boolean5' => array('type' => 'boolean', 'json' => false)
	);
}