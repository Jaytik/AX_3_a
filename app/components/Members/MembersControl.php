<?php

namespace App\Components\Members;

use Nette;
use App\Model\UserRepository;
        
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MembersControl
 *
 * @author Jago
 */
class MembersControl extends \Nette\Application\UI\Control{
    //put your code here
     private $userRepository;
     private $mesto;
     private $jmeno;
     private $stat;
     private $mesic; 
     private $typ; 
     private $rok; 
     private $db; 
        
    public function __construct(UserRepository $userRepository, Nette\Database\Context $db) {
        $this->userRepository = $userRepository;
        $this->db = $db;
    }   
    
    
    public function render(){
        //echo '<h3 class="cente">SEARCH FROM DATABASE</h2>';    DO +SABLONY
        $this->template->setFile(__DIR__."/templates/default.latte");
        
        //$this->template->users = $this->userRepository->findAll();
        $this->template->users = $this->userRepository->findAll();
        //$this->template->users = $this->userRepository->findByMesto($this->mesic, $this->typ, $this->rok);
        //$users = $this->db->table('tabulka');
        //dump ($this->mesic,$this->typ,$this->rok);
        //$this->template->users = $users;
        $this->template->render();
        
    }
    
    
}
        

   

