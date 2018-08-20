<?php

namespace Models;

/**
 * Description of user
 *
 * @author Ionut
 */
class User extends \Library\Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function create($data){
        
        $insert = $this->dataBase->prepare("INSERT INTO users (`name`, `gender`, `email`, `password`, `function`) VALUES (:name, :gender, :email, :password, :function);");
        $insert->execute(array(
            ':name'     =>$data['name'], 
            ':gender'   =>$data['gender'],
            ':email'    =>$data['email'],
            ':password' => \Library\Hash::encryptsPassword($data['password']),
            ':function' =>$data['function']
        ));
    }
    
    public function login($data){
        
        $select = $this->dataBase->prepare("SELECT `email`, `function` FROM users WHERE `email`=:email AND `password`=:password;");
        $select->execute(array(
            ':email'    => $data['email'],
            ':password' => \Library\Hash::encryptsPassword($data['password'])
        ));
        
        return $select -> fetchAll();
    }
}
