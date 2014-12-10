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
class Users extends \Nette\Object {

    /** @var \DibiConnection */
    private $db;
    private $table = "users";
    public static $user_salt = "1234123412341234123412";
    
    public function register($data) {
    unset($data["password2"]);
    $data["role"] = "guest";
    $data["password"] = sha1($data["password"] . self::$user_salt);
    return $this->db->insert($this->table, $data)->execute(dibi::IDENTIFIER);
}
}
