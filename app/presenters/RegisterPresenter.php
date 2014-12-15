<?php

namespace App\Presenters;

use App\Components\Register\RegisterControl;
use App\Components\Register\RegisterControlFactory;


class RegisterPresenter extends BasePresenter
{

	/**
	 * @var RegisterControlFactory
	 */
	private $registerControlFactory;


	public function __construct(RegisterControlFactory $registerControlFactory)
	{
		$this->registerControlFactory = $registerControlFactory;
	}


	/**
	 * @return RegisterControl
	 */
	protected function createComponentRegister()
	{
		return $this->registerControlFactory->create();
	}

}
