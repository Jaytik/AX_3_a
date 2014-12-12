<?php

namespace App\Model;

use Nette;


/**
 * Description of UserRepository
 *
 * @author Jago
 */
class UserRepository {
    //put your code here
    //private $db;
    private $table;
    private $members;

    public function __construct(Nette\Database\Context $db) {
            //$this->db = $db;
            $this->table = $db->table('tabulka');
            $this->members = $db->table('users');

        }
    public function findByMesto($mesic,$typ,$rok){
        $users = $this->table;
        if ($mesic){
            //$users->where("mesto",$mesto);
            $users->where('mesic', $mesic);
            //$users->where('mesic = ? AND typ LIKE ? AND rok = ?', $mesic, "%".$typ."%", $rok);
            dump($rok);
        }
        if ($rok){
            //dump($rok);
            echo "xxxxxxxx";
            $users->where('rok', $rok);
        }
        if ($typ){
            //dump($rok);
            echo "xxxxxxxx";
            $users->where('typ', $typ);
        }

        return $users;

    }

	public function findAll(){
        $users = $this->members;
        return $users;
    }


	/**
	 * @param array $criteria
	 * @return bool|mixed|Nette\Database\Table\IRow
	 */
	public function findOneBy(array $criteria)
	{
		return $this->findBy($criteria)->fetch();
	}


	/**
	 * @param array $criteria
	 * @return Nette\Database\Table\Selection
	 */
	public function findBy(array $criteria)
	{
		return $this->members->where($criteria);
	}

}
