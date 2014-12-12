<?php

namespace App\Components;


use Nette\Application\UI\Form;


class NameEmailContainerFactory
{

	public function create()
	{
		$form = new Form;
		$form->addText('name', 'Jméno');
		$form->addText('email', 'E-mail: *', 35)
			->setEmptyValue('@')
			->addRule(Form::FILLED, 'Vyplňte email')
			->addCondition(Form::FILLED)
			->addRule(Form::EMAIL, 'Neplatná emailová adresa');
		return $form;
	}

}
