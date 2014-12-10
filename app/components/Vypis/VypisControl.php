<?php

namespace App\Components\Vypis;

use Nette;
use App\Model\UserRepository;
        
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VypisControl
 *
 * @author Jago
 */
class VypisControl extends \Nette\Application\UI\Control{
    //put your code here
     private $userRepository;
     private $mesto;
     private $jmeno;
     private $stat;
     private $mesic; 
     private $typ; 
     private $rok; 
        
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }   
            
    public function render(){
        //echo '<h3 class="cente">SEARCH FROM DATABASE</h2>';    DO +SABLONY
        $this->template->setFile(__DIR__."/templates/default.latte");
        
        //$this->template->users = $this->userRepository->findByMesto($this->mesto, $this->jmeno);
        $this->template->users = $this->userRepository->findByMesto($this->mesic, $this->typ, $this->rok);
        //dump ($this->mesic,$this->typ,$this->rok);
        $this->template->render();
        
    }
    
    protected function createComponentForm(){
        
        $form = new \Nette\Application\UI\Form;

        $form->addText('jmeno', 'Jméno:');
        
        $form->addSelect('mesic', 'Měsíc:', ['1' => '1',
        '2' => '2','3' => '3',
        ])
                ->setPrompt('vyber')
                ->setAttribute('class', 'selectos');
        
        
        $form->addSelect('typ', 'Typ:', ['mobJa' => 'mobJa',
        'pojAuto' => 'pojAuto','nokia' => 'nokia',
        ])
                ->setPrompt('vyber')  //funguje pouze u SELECTU
                ->setAttribute('class', 'selectos');
        
        
        $form->addSelect('rok', 'Rok:', ['2012' => '2012',
        '2013' => '2013','2014' => '2014',
        ])
                ->setPrompt('vyber')
                ->setAttribute('class', 'selectos');
        
       
        $form->addSubmit('send', 'Search')
                ->setAttribute('class', 'sender');
        $form->onSuccess[]=$this->procesForm;
        return $form;
        
        }
    public function procesForm($form,$values){
        dump ($values);
        //$this->mesto = $values->mesto;
        //$this->mesto = $values->mesto;
        $this->mesic = $values->mesic;
        $this->typ = $values->typ;
        $this->rok = $values->rok;
        
          
        
        
        
    }
}
        

   

