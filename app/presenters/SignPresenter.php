<?php

namespace App\Presenters;

use App\Components\SignIn\SignInControl;
use App\Components\SignIn\SignInControlFactory;

use Nette,
	App\Model;


class SignPresenter extends BasePresenter
{

	/**
	 * @var SignInControlFactory
	 */
	private $signInControlFactory;


	public function __construct(SignInControlFactory $signInControlFactory)
	{
		$this->signInControlFactory = $signInControlFactory;
	}


	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('You have been signed out.');
		$this->redirect('in');
	}


	/**
	 * @return SignInControl
	 */
	protected function createComponentSignIn()
	{
		return $this->signInControlFactory->create();
	}

}
