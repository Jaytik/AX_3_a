<?php
namespace App\Presenters;
use Nette;

abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	public function handleLogout()
	{
		if ($this->user->isLoggedIn()) {
			$this->user->logout(TRUE);
		}
		$this->redirect('this');
	}
}
