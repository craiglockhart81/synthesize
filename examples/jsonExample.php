<?php
/**
*	This file contains example code for how to use the Synthesize package with an JSON config file.
*
*	@package	Craiglockhart81\Synthesize
*	@author		Craig Lockhart <craiglockhart81@gmail.com>
*	@license	MIT
*
*/

//include the composer autoloader
require_once(__DIR__.'/../vendor/autoload.php');

//use the Synthesizer
use Craiglockhart81\Synthesize\Synthesizer;

/**
*	JSON Example Class
*
*	Class to show an example of how to use the Synthesize package with an array.
*
*	@package	Craiglockhart81\Synthesize
*
*/
class JSONExample {

	//include the Sythesizer trait
	use Synthesizer;
}

//create the object
$objExample = new JSONExample();

//use the synthesized variables
$objExample->myString = 'hello world';
echo $objExample->myString.PHP_EOL;