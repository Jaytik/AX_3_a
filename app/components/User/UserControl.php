<?php

namespace App\Components\User;

use App\Components\NameEmailContainerFactory;
use App\Model\UserRepository;
use Nette;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;


class UserControl extends Control
{

	/**
	 * @var Nette\Database\Row
	 */
	private $user;

	/**
	 * @var NameEmailContainerFactory
	 */
	private $nameEmailContainerFactory;

	/**
	 * @var UserRepository
	 */
	private $userRepository;


	public function __construct(
		NameEmailContainerFactory $nameEmailContainerFactory,
		UserRepository $userRepository
	) {
		$this->nameEmailContainerFactory = $nameEmailContainerFactory;
		$this->userRepository = $userRepository;
	}


	public function setUser($user)
	{
		$this->user = $user;
	}


	/**
	 * @return Form
	 */
	protected function createComponentForm()
	{
		$form = $this->nameEmailContainerFactory->create();
		$form->addSubmit('send', 'Uložit')
			->setAttribute('class', 'sender');
		$form->onSuccess[] = callback($this, 'processForm');
		$form->setDefaults($this->user);
		return $form;
	}


	public function processForm(Form $form, $values)
	{
		$this->userRepository->update($this->user->id, $values);
		$this->presenter->flashMessage('Uloženo úspěšně');
		$this->presenter->redirect('Cms:membersControl');
	}


	public function render()
	{
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}

}
