<?php

namespace Controllers;

/**
 * Description of user
 *
 * @author Ionut
 */
class User extends \Library\Controller{
    
    public function __construct() {
        parent::__construct();
        $this->view->message = NULL;
        $this->view->messageType = NULL;
    }
    
    public function create(){
        
        $this->view->render('user/create');
    }
    
    public function login(){
        $this->view->render('user/login');
    }

    public function logged(){
        $data['email']       = $_POST['email'];
        $data['password']    = $_POST['password'];
        $hasAccount = $this->model->login($data);
        if(count($hasAccount)){
            \Library\Session::set('connected', TRUE);
            \Library\Session::set('function', $hasAccount[0]['function']);
            $this->view->message = 'Now you\'re logged in.';
            $this->view->messageType = 'info';
            $this->view->render('user/message');
        }
        else{
            $this->view->message = 'Your email or password is wrong.';
            $this->view->render('user/login');
        }
    }

    public function save(){
        
        $data['name']       = $_POST['name'];
        $data['gender']     = $_POST['gender'];
        $data['email']      = $_POST['email'];
        $data['password']   = $_POST['password'];
        $data['function']   = $_POST['function'];
        
        if(empty($data['name']) || empty($data['email']) || empty($data['password'])){
            
            $this->view->message = 'All fields are required.';
            $this->view->render('user/create');
        }
        else{
            $this->model->create($data);
            \Library\Session::set('connected', TRUE);
            \Library\Session::set('function', $data['function']);
            $this->view->message = 'Wellcome <b>' . $data['name'] . '</b>, your account was created successfully. <br /> Now you\'re logged in.';
            $this->view->messageType = 'info';
            $this->view->render('user/message');
        }
    }
    
    public function logout(){
        \Library\Session::destroy();
        $this->view->message = 'You were disconnected.';
        $this->view->messageType = 'info';
        $this->view->render('user/message');
    }
}
