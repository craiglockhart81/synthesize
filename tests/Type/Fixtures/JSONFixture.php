<?php

namespace Craiglockhart81\Synthesize\Tests\Type\Fixtures;

use Craiglockhart81\Synthesize\Synthesizer;

class JSONFixture implements \JsonSerializable {

	//include the Sythesizer trait
	use Synthesizer;

	public function test(){
		return true;
	}
}