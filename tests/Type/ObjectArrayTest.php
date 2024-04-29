<?php

namespace Craiglockhart81\Synthesize\Tests\Type;

use Craiglockhart81\Synthesize\Tests\Type\Fixtures\ObjectArrayFixture;

class ObjectArrayTest extends \PHPUnit_Framework_TestCase {

	protected $objObjectArray;

	protected function setUp(){
		$this->objObjectArray = new ObjectArrayFixture();
	}

	public function testEmptyArrayOnCreate(){
		$this->assertEquals(0, $this->objObjectArray->objectarray()->count());
		$this->assertEquals(array(), $this->objObjectArray->objectarray);
		$this->assertInstanceOf('Craiglockhart81\Synthesize\Type\ArrayObject', $this->objObjectArray->objectarray());
	}

	public function testPossitiveInt(){
		$this->setExpectedException('Craiglockhart81\Synthesize\Exception\TypeException');
		$this->objObjectArray->objectarray = 4;
	}

	public function testNagativeInt(){
		$this->setExpectedException('Craiglockhart81\Synthesize\Exception\TypeException');
		$this->objObjectArray->objectarray = -4;
	}

	public function testZero(){
		$this->setExpectedException('Craiglockhart81\Synthesize\Exception\TypeException');
		$this->objObjectArray->objectarray = 0;
	}

	public function testNull(){
		$this->objObjectArray->objectarray = null;
		$this->assertEquals(0, count($this->objObjectArray->objectarray));
	}

	public function testFloat(){
		$this->setExpectedException('Craiglockhart81\Synthesize\Exception\TypeException');
		$this->objObjectArray->objectarray = 4.5;
	}

	public function testNegtiveFloat(){
		$this->setExpectedException('Craiglockhart81\Synthesize\Exception\TypeException');
		$this->objObjectArray->objectarray = -4.5;
	}

	public function testString(){
		$this->setExpectedException('Craiglockhart81\Synthesize\Exception\TypeException');
		$this->objObjectArray->objectarray = 'hello';
	}

	public function testStringInt(){
		$this->setExpectedException('Craiglockhart81\Synthesize\Exception\TypeException');
		$this->objObjectArray->objectarray = '4';
	}

	public function testArray(){
		$arrOne = array();
		$arrTwo = array(new \DateTime(), new \DateTime());

		$this->objObjectArray->objectarray = $arrOne;
		$this->assertEquals($arrOne, $this->objObjectArray->objectarray);
		$this->assertEquals(0, count($this->objObjectArray->objectarray));

		$this->objObjectArray->objectarray = $arrTwo;
		$this->assertEquals($arrTwo, $this->objObjectArray->objectarray);
		$this->assertEquals(2, count($this->objObjectArray->objectarray));
	}

	public function badArray(){
		$this->setExpectedException('Craiglockhart81\Synthesize\Exception\TypeException');
		$this->objObjectArray->objectarray = array(1,2,3);
	}

	public function testObject(){
		$this->setExpectedException('Craiglockhart81\Synthesize\Exception\TypeException');
		$this->objObjectArray->objectarray1 = new \DateTime();
	}

	public function testCount(){
		$arrData = array(new \DateTime(), new \DateTime());

		$this->objObjectArray->objectarray1 = $arrData;
		$this->assertEquals(2, $this->objObjectArray->objectarray1()->count());
	}

	public function testCreate(){
		$this->assertEquals(0, $this->objObjectArray->objectarray1()->count());

		$objDateTime = $this->objObjectArray->objectarray1()->create();
		$this->assertEquals(1, $this->objObjectArray->objectarray1()->count());

		$objDateTime2 = $this->objObjectArray->objectarray1()->create();
		$this->assertEquals(2, $this->objObjectArray->objectarray1()->count());

		$objDateTime3 = $this->objObjectArray->objectarray1()->create();
		$this->assertEquals(3, $this->objObjectArray->objectarray1()->count());

		$objDateTime4 = $this->objObjectArray->objectarray1()->create();
		$this->assertEquals(4, $this->objObjectArray->objectarray1()->count());
	}

	public function testPassingObjectParams(){
		$this->objObjectArray->objectarray1 = array();
		$this->objObjectArray->objectarray1()[] = '2015-11-25';
		$this->assertEquals(array(new \DateTime('2015-11-25')), $this->objObjectArray->objectarray1);

		$this->objObjectArray->objectarray1 = array();
		$this->objObjectArray->objectarray1()[] = new \DateTime('2015-11-25');
		$this->assertEquals(array(new \DateTime('2015-11-25')), $this->objObjectArray->objectarray1);
	}

	public function testPassingBadObjectParams(){
		$this->setExpectedException('Craiglockhart81\Synthesize\Exception\TypeException');
		$this->objObjectArray->objectarray1 = array();
		$this->objObjectArray->objectarray1()[] = 'hello';
	}

	public function testMaxEquals(){
		$arrData = array(new \DateTime(), new \DateTime(), new \DateTime());
		$this->objObjectArray->objectarray2 = $arrData;
		$this->assertEquals($arrData, $this->objObjectArray->objectarray2);
		$this->assertEquals(3, count($this->objObjectArray->objectarray2));

		$this->objObjectArray->objectarray2 = array();
		$this->objObjectArray->objectarray2()[] = new \DateTime();
		$this->objObjectArray->objectarray2()[] = new \DateTime();
		$this->objObjectArray->objectarray2()[] = new \DateTime();
		$this->assertEquals($arrData, $this->objObjectArray->objectarray2);
		$this->assertEquals(3, count($this->objObjectArray->objectarray2));
	}

	public function testMaxAbove(){
		$this->setExpectedException('Craiglockhart81\Synthesize\Exception\MaxException');
		$this->objObjectArray->objectarray2 = array();
		$this->objObjectArray->objectarray2()[] = new \DateTime();
		$this->objObjectArray->objectarray2()[] = new \DateTime();
		$this->objObjectArray->objectarray2()[] = new \DateTime();
		$this->objObjectArray->objectarray2()[] = new \DateTime();
	}

	public function testMaxBelow(){
		$arrData = array(new \DateTime(), new \DateTime());
		$this->objObjectArray->objectarray2 = $arrData;
		$this->assertEquals($arrData, $this->objObjectArray->objectarray2);
		$this->assertEquals(2, count($this->objObjectArray->objectarray2));

		$this->objObjectArray->objectarray2 = array();
		$this->objObjectArray->objectarray2()[] = new \DateTime();
		$this->objObjectArray->objectarray2()[] = new \DateTime();
		$this->assertEquals($arrData, $this->objObjectArray->objectarray2);
		$this->assertEquals(2, count($this->objObjectArray->objectarray2));
	}

	public function testJSONOutput(){
		$arrData = array(new \DateTime(), new \DateTime());

		$this->objObjectArray->objectarray = $arrData;
		$this->objObjectArray->objectarray2 = null;
		$this->objObjectArray->objectarray3 = null;
		$this->objObjectArray->objectarray4 = null;

		//objectarray is set
		$strExpecetedJSON = '{"objectarray":'.json_encode($arrData).',"objectarray3":null}';
		$strJSON = json_encode($this->objObjectArray);
		$this->assertEquals($strExpecetedJSON, $strJSON);
	}

	public function testJSONFalseOption(){
		$arrData = array(new \DateTime(), new \DateTime());

		$this->objObjectArray->objectarray = null;
		$this->objObjectArray->objectarray1 = null;
		$this->objObjectArray->objectarray2 = null;
		$this->objObjectArray->objectarray3 = null;
		$this->objObjectArray->objectarray4 = $arrData;

		//objectarray3 shouldnt be shown as it has the option 'json==false'
		$strExpecetedJSON = '{"objectarray3":null}';
		$strJSON = json_encode($this->objObjectArray);
		$this->assertEquals($strExpecetedJSON, $strJSON);
	}

	public function testJSONNull(){
		$this->objObjectArray->objectarray = null;
		$this->objObjectArray->objectarray1 = null;
		$this->objObjectArray->objectarray2 = null;
		$this->objObjectArray->objectarray3 = null;
		$this->objObjectArray->objectarray4 = null;

		//everything is null - only objectarray3 shows null
		$strExpecetedJSON = '{"objectarray3":null}';
		$strJSON = json_encode($this->objObjectArray);
		$this->assertEquals($strExpecetedJSON, $strJSON);
	}
}