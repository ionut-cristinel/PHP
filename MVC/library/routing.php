<?php

namespace Library;

/**
 * Description of routing
 *
 * @author Ionut
 */
class Routing {
    
    public $controller;
    public $action;
    public $args = array();
    public $link;
    public $file;

    public function __construct($link) {
        
        \Library\Session::init();
        
        $this->setValues($link);
        
        if(file_exists($this->file)){

            require_once $this->file;
        }
        else{
            require_once 'controllers/error.php';
            \Library\Factory::create('controler', 'error')->controllerNotFound();
            return FALSE;
        }
        
        $this->runControllerAndAction();
    }
    
    private function setValues($link){
        
        $this->link = filter_var($link, FILTER_SANITIZE_URL);
        $this->link = explode('/', $this->link);
            
        $this->controller = $this->link[0];
        $this->action = (isset($this->link[1])) ? $this->link[1] : FALSE;
        
        for($i = 2; $i < count($this->link); $i++){
            if(!empty($this->link[$i])){
                $this->args[] = $this->link[$i];
            }
        }
        
        $this->file = 'controllers/' . $this->controller . '.php';
    }
    
    private function runControllerAndAction(){
        
        $start = \Library\Factory::create('controler', $this->controller);
        $start -> loadModel($this->controller);
        
        if($this->action != FALSE){
            
            if(method_exists($start, $this->action)){
                
                switch(count($this->args)){
                    case 0:
                        $start->{$this->action}();
                        break;
                    case 1:
                        $start->{$this->action}($this->args[0]);
                        break;
                    case 2:
                        $start->{$this->action}($this->args[0], $this->args[1]);
                        break;
                    case 3:
                        $start->{$this->action}($this->args[0], $this->args[1], $this->args[2]);
                        break;
                }
            }
            else{
                require_once 'controllers/error.php';
                $error = \Library\Factory::create('controler', 'error')->actionNotFound();
            }
        }
        else{ $start -> index(); }
    }
}
