<?php

namespace App\Presenters;

use App\Components\FiltrPlat\FiltrPlatControlFactory;
use App\Components\SignIn\SignInControlFactory;
use App\Components\Vypis\VypisControlFactory;
use Nette,
	App\Model;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
        private $db;
        private $filtrPlatControlFactory;
        private $vypisControlFactory;

        public function __construct(
	        Nette\Database\Context $db,
	        FiltrPlatControlFactory $filtrPlatControlFactory,
	        VypisControlFactory $vypisControlFactory
        ) {
            $this->db = $db;
            $this->filtrPlatControlFactory = $filtrPlatControlFactory;
            $this->vypisControlFactory = $vypisControlFactory;
        }
        /*public function startup()
	{
		parent::startup();

		if ( ! $this->user->isLoggedIn()) {
			$this->user->login('email@gmail.com', 'tajneheslo');
			$this->redirect('this');
		}
	}*/
	public function renderDefault()
	{

                $this->template->anyVariable = 'any value';
                $users = $this->db->table('tabulka');
                //dump($selection);
                $this->template->users = $users;

	}
        public function renderJmena()
	{
                //$this->search = $search;
                //dump($search);
		$this->template->anyVariable = 'any value';
                $selection = $this->db->table('tabulka')->where('jmeno', 'Evžen');

                //dump($selection);
                $this->template->selection = $selection;

	}

        public function renderDetail($id)
	{
		//dump($id);
                $this->template->anyVariable = 'any value';
                $selection = $this->db->table('tabulka');
                    $uzivatel = $selection->get($id);
                    //dump($id);
                    if($uzivatel == NULL)
                        {
                        $this->redirect("Homepage:Detail",array("id" => '1'));

                        }
                         $this->template->uzivatel = $uzivatel;
                //dump($selection);
                $this->template->selection = $selection;

	}
        public function renderSave(){
            return $this->filtrPlat;
        }
        public function renderSele(){
            return $this->vypis;
        }
        public function renderSigno(){
            return $this->signIn;
        }
        protected function createComponentFiltrPlat() {
            return $this->filtrPlatControlFactory->create();
        }
        protected function createComponentVypis() {
            return $this->vypisControlFactory->create();
        }

}
