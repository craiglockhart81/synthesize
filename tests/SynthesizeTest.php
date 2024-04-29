<?php

namespace Craiglockhart81\Synthesize\Tests;

use Craiglockhart81\Synthesize\Tests\Type\Fixtures\IdFixture;

class SynthesizeTest extends \PHPUnit_Framework_TestCase {

	protected $objSynthesize;

	protected function setUp(){
		$this->objSynthesize = new IdFixture();
	}

	public function testGet(){

		$this->markTestIncomplete();
	}
}