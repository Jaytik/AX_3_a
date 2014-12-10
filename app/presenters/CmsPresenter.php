<?php
namespace App\Presenters;
use Nette;

class CmsPresenter extends BasePresenter
{
        private $filtrPlatControlFactory;
        private $db;
        private $membersControlFactory;
        
        public function __construct(\Nette\Database\Context $db, \App\Components\FiltrPlat\FiltrPlatControlFactory $filtrPlatControlFactory, \App\Components\Members\MembersControlFactory $membersControlFactory) {
            $this->db = $db;
            $this->filtrPlatControlFactory = $filtrPlatControlFactory;
            $this->membersControlFactory = $membersControlFactory;
           
            parent::__construct();
        }
	protected function startup()
	{
		parent::startup();
		if ($this->hasUserAccess() === FALSE) {
			$this->flashMessage('Sem nemáte přístup', 'error');
			$this->redirect('Homepage:');
		}
	}
	/**
	 * @return bool
	 */
	private function hasUserAccess()
	{
		if ($this->user->isLoggedIn() && $this->user->isInRole('admin')) {
			return TRUE;
		}
		return FALSE;
	}
        public function renderDelet($id)
	{
		//dump($id);
                $selection = $this->db->table('users');
                    $uzivatel = $selection->get($id);
                    dump($id);
                        
                    $xx = $this->db->table('users')->where('id', $id)->delete();
                    dump($xx);
                    $zz = $selection->get($id);
                    dump($zz);
                  
                $this->template->selection = $selection;
                if($uzivatel){
                    $this->flashMessage('Uživatel byl odstraněn');
                    $this->redirect('Cms:MembersControl');
           
                }
	}
        public function renderMembers(){
            return $this->members;
        }
        public function renderSave(){
            return $this->filtrPlat;
        }
        protected function createComponentFiltrPlat() {
            return $this->filtrPlatControlFactory->create();
        }
        protected function createComponentMembers() {
            return $this->membersControlFactory->create();
        }
}