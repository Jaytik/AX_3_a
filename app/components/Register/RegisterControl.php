<?php

namespace App\Components\Register;

use App\Components\NameEmailContainerFactory;
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

	/**
	 * @var NameEmailContainerFactory
	 */
	private $nameEmailContainerFactory;

	/**
	 * @var bool
	 */
	private $registrationSuccessful = FALSE;


	public function __construct(
		UserRepository $userRepository,
		UserManager $userManager,
		NameEmailContainerFactory $nameEmailContainerFactory
	) {
		$this->userRepository = $userRepository;
		$this->userManager = $userManager;
		$this->nameEmailContainerFactory = $nameEmailContainerFactory;
	}


	protected function createComponentForm()
	{
		$form = $this->nameEmailContainerFactory->create();
		$form->getElementPrototype()->class = 'ajax';
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
		$form->onSuccess[] = callback($this, 'processForm');
		return $form;
	}


	public function processForm(Form $form, $values) {
		//$role = 'guest';
		$email = $this->userRepository->findOneBy(array('email' => $values->email));

		if ($email) {
			$form->addError('Tento email je již používán.');
		} else {
			$this->userManager->add($values->email, $values->password, $values->name);
			$this->presenter->flashMessage('Uživatel registrován - presenter.');
			$this->registrationSuccessful = TRUE;
		}

		$this->presenter->redrawControl('flashes');
		$this->redrawControl();
	}


	public function render()
	{
		$this->template->registrationSuccessful = $this->registrationSuccessful;
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}

}
