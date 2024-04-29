<?php
/**
*	This file contains example code for how to use the Synthesize package with an array.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

//include the composer autoloader
require_once(__DIR__.'/../vendor/autoload.php');

include('Months.php');

//use the Synthesizer
use Craiglockhart81\Synthesize\Synthesizer;

/**
*	ArrayExample Class
*
*	Class to show an example of how to use the Synthesize package with an array.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class ArrayExample implements \JsonSerializable {

	//include the Sythesizer trait
	use Synthesizer;

	//set the synthesized variables
	protected $arrSynthesize = array(
		'array' => array('type' => 'array')
	);
}

//create the object
$objExample = new ArrayExample();

$objExample->array()[] = 'hello';
//$objExample->array[] = 'world';



$strJSON = json_encode($objExample);
echo $strJSON.PHP_EOL;