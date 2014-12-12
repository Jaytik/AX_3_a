<?php

namespace App\Components\Register;

use App\Model\UserManager;
use App\Model\UserRepository;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Security\IAuthenticator;


class RegisterControl extends Control
{

	/**
	 * @var UserRepository
	 */
	private $userRepository;

	/**
	 * @var UserManager
	 */
	private $userManager;


	public function __construct(UserRepository $userRepository, UserManager $userManager)
	{
		$this->userRepository = $userRepository;
		$this->userManager = $userManager;
	}


	protected function createComponentForm()
	{
		$form = new Form;
		$form->addText('name', 'Jméno');
		$form->addText('email', 'E-mail: *', 35)
			->setEmptyValue('@')
			->addRule(Form::FILLED, 'Vyplňte Váš email')
			->addCondition(Form::FILLED)
			->addRule(Form::EMAIL, 'Neplatná emailová adresa');
		$form->addPassword('password', 'Heslo: *', 20)
			->setOption('description', 'Alespoň 6 znaků')
			->addRule(Form::FILLED, 'Vyplňte Vaše heslo')
			->addRule(Form::MIN_LENGTH, 'Heslo musí mít alespoň %d znaků.', 6);
		$form->addPassword('password2', 'Heslo znovu: *', 20)
			->addConditionOn($form['password'], Form::VALID)
			->addRule(Form::FILLED, 'Heslo znovu')
			->addRule(Form::EQUAL, 'Hesla se neshodují.', $form['password']);
		$form->addSubmit('send', 'Registrovat')
			->setAttribute('class', 'sender');
		$form->onSuccess[] = callback($this, 'registerFormSubmitted');
		return $form;
	}


	public function registerFormSubmitted(Form $form, $values) {
		//$role = 'guest';
		$email = $this->userRepository->findOneBy(array('email' => $values->email));

		if ($email) {
			$form->addError('Tento email je již používán.');
		} else {
			$this->userManager->add($values->email, $values->password, $values->name);
			$this->presenter->flashMessage('Uživatel registrován.');
			$this->presenter->redirect('Homepage:default');
		}
	}


	public function render()
	{
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}

}
