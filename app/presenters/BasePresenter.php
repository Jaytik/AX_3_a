<?php
namespace App\Presenters;
use Nette;

abstract class BasePresenter extends Nette\Application\UI\Presenter
{

	/**
	 * @inject
	 * @var Nette\Security\IAuthenticator $authenticator
	 */
	public $authenticator; // pokud potřebuješ v parent třídě, je lepší volat @inject anotaci, ne parent::__construct()


	public function handleLogout()
	{
		if ($this->user->isLoggedIn()) {
			$this->user->logout(TRUE);
		}
		$this->redirect('this');
	}

}
