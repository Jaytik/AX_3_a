<?php

namespace App\Components\FiltrPlat;

use Nette;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FiltrPlatControl
 *
 * @author Jago
 */
class FiltrPlatControl extends \Nette\Application\UI\Control{
    //put your code here
     private $db;
        
        public function __construct(Nette\Database\Context $db) {
            $this->db = $db;
            //dump ($db);
            parent::__construct();
        }
            
    public function render(){
        echo '<h3 class="cente">SAVE TO DATABASE</h2>';
        $this->template->setFile(__DIR__."/templates/default.latte");
        $this->template->render();
    }
    protected function createComponentForm(){
        $form = new \Nette\Application\UI\Form;

        $form->addText('jmeno', 'Jméno:');
        $form->addText('plat', 'plat:');
        $form->addText('mesto', 'mesto:');
        $form->addText('kraj', 'kraj:');
        $form->addText('stat', 'stat:');
        $form->addSubmit('send', 'Save')
                ->setAttribute('class', 'sender');
        $form->onSuccess[]=$this->procesForm;
        return $form;
    }
    public function procesForm($form, $values){
        //dump ($values);
        $this->db->table('tabulka')->insert($values);
        //$this->redirect('this');
        if($values){
            $this->flashMessage('Uloženo v databázi');
            $this->redirect('this');
           
        }
    }
}
