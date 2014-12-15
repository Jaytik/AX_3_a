<?php

namespace Tests\App\Model;

use App\Model\UserRepository;
use Tests\TestCase;


class UserRepositoryTest extends TestCase
{

	public function testInAvailableInContainer()
	{
		$userRepository = $this->container->getByType('App\Model\UserRepository');
		$this->assertInstanceOf('App\Model\UserRepository', $userRepository);
	}


	public function testFindByMesto()
	{
		/** @var UserRepository $userRepository */
		$userRepository = $this->container->getByType('App\Model\UserRepository');

		$result = $userRepository->findByMesto(1, NULL, NULL);
		$this->assertTrue(count($result) >= 1);
	}

}
