<?php

namespace Tests;

use Nette\DI\Container;
use PHPUnit_Framework_TestCase;


abstract class TestCase extends PHPUnit_Framework_TestCase
{

	/**
	 * @var Container
	 */
	protected $container;


	protected function setUp()
	{
		$this->container = include __DIR__ . '/../app/bootstrap.php';
	}

}
