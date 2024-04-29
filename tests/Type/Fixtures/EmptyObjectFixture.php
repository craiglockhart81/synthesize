<?php

namespace Craiglockhart81\Synthesize\Tests\Type\Fixtures;

use Craiglockhart81\Synthesize\Synthesizer;

class EmptyObjectFixture implements \JsonSerializable {

	//include the Sythesizer trait
	use Synthesizer;

	//set the synthesized variables
	protected $arrSynthesize = array(
		'int' => array('type' => 'int'),
		'int1' => array('type' => 'int')
	);
}