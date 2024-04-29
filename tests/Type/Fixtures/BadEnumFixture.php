<?php

namespace Craiglockhart81\Synthesize\Tests\Type\Fixtures;

use Craiglockhart81\Synthesize\Synthesizer;

class BadEnumFixture implements \JsonSerializable {

	//include the Sythesizer trait
	use Synthesizer;

	//set the synthesized variables
	protected $arrSynthesize = array(
		'enum' => array('type' => 'enum')
	);
}