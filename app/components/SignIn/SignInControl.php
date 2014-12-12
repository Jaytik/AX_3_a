<?php
namespace App\Components\SignIn;
use Nette;
use Nette\Application\UI\Control;
class SignInControl extends Control
{
	/**
	 * @var Nette\Security\User
	 */
	private $user;
	public function __construct(Nette\Security\User $user)
	{
		$this->user = $user;
	}
	protected function createComponentForm()
	{
		$form = new Nette\Application\UI\Form;
		$form->addText('username', 'Username:')
			->setRequired('Please enter your username.');
		$form->addPassword('password', 'Password:')
			->setRequired('Please enter your password.');
		$form->addSubmit('send', 'Sign in');
		// call method signInFormSucceeded() on success
		$form->onSuccess[] = $this->signInFormSucceeded;
		return $form;
	}
	public function signInFormSucceeded($form, $values)
	{
		try {
			$this->user->login($values->username, $values->password);
			$this->presenter->flashMessage('Byli jste úspěšně přihlášeni');
			$this->presenter->redirect('Homepage:');

		} catch (Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}
	public function render()
	{
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}
}
