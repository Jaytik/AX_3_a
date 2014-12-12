<?php

namespace App\Components\User;

use App\Components\NameEmailContainerFactory;
use Nette;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;


class UserControl extends Control
{

	/**
	 * @var NameEmailContainerFactory
	 */
	private $nameEmailContainerFactory;


	public function __construct(NameEmailContainerFactory $nameEmailContainerFactory)
	{
		$this->nameEmailContainerFactory = $nameEmailContainerFactory;
	}


	protected function createComponentForm()
	{
		$form = $this->nameEmailContainerFactory->create();
		$form->addSubmit('send', 'Uložit')
			->setAttribute('class', 'sender');
		$form->onSuccess[] = callback($this, 'processForm');
		return $form;
	}


	public function processForm($form, $values)
	{
		dump($values);
		die;
	}

	public function render()
	{
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}

}
