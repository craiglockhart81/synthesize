<?php

namespace Craiglockhart81\Synthesize\Tests\Type;

use Craiglockhart81\Synthesize\Type\SynthesizeOption;
use Craiglockhart81\Synthesize\Type\TypeFactory;
use Craiglockhart81\Synthesize\Tests\Type\Fixtures\MonthsFixture;

class TypeFactoryTest extends \PHPUnit_Framework_TestCase {

	public function synthesizerOptionProvider(){
		return array(
			"arrayObject" => array(
				array('type' => 'arrayObject'),
				'Craiglockhart81\Synthesize\Type\ArrayObject'
			),
			"boolean" => array(
				array('type' => 'boolean'),
				'Craiglockhart81\Synthesize\Type\BooleanObject'
			),
			"dateTime" => array(
				array('type' => 'dateTime'),
				'Craiglockhart81\Synthesize\Type\DateTimeObject'
			),
			"dictionary" => array(
				array('type' => 'dictionary'),
				'Craiglockhart81\Synthesize\Type\DictionaryObject'
			),
			"enum" => array(
				array('type' => 'enum', 'class' => 'Craiglockhart81\Synthesize\Tests\Type\Fixtures\MonthsFixture'),
				'Craiglockhart81\Synthesize\Type\EnumObject'
			),
			"float" => array(
				array('type' => 'float'),
				'Craiglockhart81\Synthesize\Type\FloatObject'
			),
			"id" => array(
				array('type' => 'id'),
				'Craiglockhart81\Synthesize\Type\IdObject'
			),
			"int" => array(
				array('type' => 'int'),
				'Craiglockhart81\Synthesize\Type\IntObject'
			),
			"number" => array(
				array('type' => 'number'),
				'Craiglockhart81\Synthesize\Type\NumberObject'
			),
			"object" => array(
				array('type' => 'object'),
				'Craiglockhart81\Synthesize\Type\ObjectObject'
			),
			"objectArray" => array(
				array('type' => 'objectArray'),
				'Craiglockhart81\Synthesize\Type\ObjectArrayObject'
			),
			"resource" => array(
				array('type' => 'resource'),
				'Craiglockhart81\Synthesize\Type\ResourceObject'
			),
			"string" => array(
				array('type' => 'string'),
				'Craiglockhart81\Synthesize\Type\StringObject'
			),
			"default" => array(
				array(),
				'Craiglockhart81\Synthesize\Type\IdObject'
			)
		);
	}

	/**
	*	@dataProvider	synthesizerOptionProvider
	*/
	public function testCreateObjects($mixOptions, $strExpectedInstance){
		$objSynthesizeOptions = new SynthesizeOption($mixOptions);

		$objType = TypeFactory::create($objSynthesizeOptions);
		$this->assertInstanceOf($strExpectedInstance, $objType);
	}

	public function testCreateFakeType(){
		$objSynthesizeOptions = new SynthesizeOption(array('type' => 'fake'));

		$this->setExpectedException('Craiglockhart81\Synthesize\Exception\UnknownTypeException');
		$objType = TypeFactory::create($objSynthesizeOptions);
	}
}