# Synthesize

Synthesizer trait to auto generate getter and setter access for objects.

[![Latest Stable Version](https://img.shields.io/packagist/v/craiglockhart81/synthesize.svg?style=flat-square)](https://packagist.org/packages/craiglockhart81/synthesize)
[![Build Status](https://img.shields.io/travis/craiglockhart81/synthesize/master.svg?style=flat-square)](https://travis-ci.org/craiglockhart81/synthesize)
[![Coverage Status](https://coveralls.io/repos/craiglockhart81/synthesize/badge.svg?branch=master&service=github)](https://coveralls.io/github/craiglockhart81/synthesize?branch=master)
[![MIT License](https://img.shields.io/packagist/l/craiglockhart81/synthesize.svg?style=flat-square)](https://github.com/craiglockhart81/synthesize/blob/master/LICENSE)
[![PHP 5.4](https://img.shields.io/badge/php-5.4-8892BF.svg?style=flat-square)](https://php.net/)
[![PHP 5.5](https://img.shields.io/badge/php-5.5-8892BF.svg?style=flat-square)](https://php.net/)
[![PHP 5.6](https://img.shields.io/badge/php-5.6-8892BF.svg?style=flat-square)](https://php.net/)
[![PHP 7](https://img.shields.io/badge/php-7-8892BF.svg?style=flat-square)](https://php.net/)


## Install

To install with Composer:

```sh
composer require craiglockhart81/synthesize
```

## Usage

```php
use Craiglockhart81\Synthesize\Synthesizer;

class Transaction {

	use Synthesizer;

	protected $arrSynthesize = array(
		'amount' => array('type' => 'float'),
		'description' => array('type' => 'string', 'default' => 'Super cool product.')
	};
}

$objTransaction = new Transaction();

$objTransaction->amount = 19.95;
$objTransaction->description = '4x Large Bowls';
```