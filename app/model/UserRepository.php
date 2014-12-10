<?php

namespace App\Model;

use Nette;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
        dump($users);
        die;
            
    }
}
