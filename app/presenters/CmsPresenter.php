<?php
namespace App\Presenters;
use App\Components\FiltrPlat\FiltrPlatControlFactory;
use App\Components\Members\MembersControlFactory;
use App\Components\User\UserControl;
use App\Components\User\UserControlFactory;
use Nette;

class CmsPresenter extends BasePresenter
{
    private $filtrPlatControlFactory;
    private $db;
    private $membersControlFactory;

	/**
	 * @var UserControlFactory
	 */
	private $userControlFactory;


	public function __construct(
	        Nette\Database\Context $db,
	        FiltrPlatControlFactory $filtrPlatControlFactory,
            MembersControlFactory $membersControlFactory,
			UserControlFactory $userControlFactory
        ) {
            $this->db = $db;
            $this->filtrPlatControlFactory = $filtrPlatControlFactory;
            $this->membersControlFactory = $membersControlFactory;

            parent::__construct();
		$this->userControlFactory = $userControlFactory;
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


	/**
	 * @param int $id
	 */
	public function handleDelete($id)
	{
        $selection = $this->db->table('users');
        $uzivatel = $selection->get($id);
        $xx = $this->db->table('users')->where('id', $id)->delete();
        $zz = $selection->get($id);

        $this->template->selection = $selection;
        if ($uzivatel) {
            $this->flashMessage('Uživatel byl odstraněn');
        }
		$this->redirect('Cms:MembersControl');
	}


	/**
	 * @param int $id
	 */
	public function actionEdit($id)
	{
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


	/**
	 * @return UserControl
	 */
	protected function createComponentUser()
	{
		return $this->userControlFactory->create();
	}

}
