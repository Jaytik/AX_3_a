<?php

namespace App\Presenters;

use Nette\Application\UI,
    Nette\Application\UI\Form as Form;


class RegisterPresenter extends BasePresenter {

    /** @var Users */
    private $users;

    /*protected function startup() {
        parent::startup();
        $this->users = $this->context->users;
    }*/
    private $db;
    private $role;
        
        public function __construct(\Nette\Database\Context $db) {
            $this->db = $db;
            
            parent::__construct();
        }
    public function renderRegister(){
    }


    protected function createComponentRegisterForm() {
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
    public function registerFormSubmitted(UI\Form $form) {
        //$role = 'guest';
        $values = $form->getValues();

        $email = $this->db->table('users')->where('email', $values->email)
                ->fetch();
        dump($values->name);
        dump($values->email);
        dump($values->password);
        //die;
        if($email) {
            $form->addError('Tento email je již používán.');
        } else {
            $this->user->getAuthenticator()->add($values->email, $values->password, $values->name);
            dump($values->name);
            //die;
            $this->flashMessage('Uživatel registrován.');
            $this->redirect('Homepage:default');
        }
}
}