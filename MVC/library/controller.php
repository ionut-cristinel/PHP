<?php

namespace Library;

/**
 * Description of controller
 *
 * @author Ionut
 */
class Controller {
    
    public $view;
    public $model;

    public function __construct() {
        
        $this -> view = Factory::create('library', 'view');
    }
    
    public function loadModel($modelName){
        
        $path = 'models/' . $modelName . '.php';
        
        if(file_exists($path)){

            require_once $path;
            $this -> model = Factory::create('model', $modelName);
        }
    }
}
