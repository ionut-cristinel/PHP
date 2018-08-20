<?php

namespace Controllers;

/**
 * Description of error
 *
 * @author Ionut
 */
class Error extends \Library\Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function controllerNotFound(){
        
        $this->view->render('error/controller-not-found');
    }
    
    public function actionNotFound(){
        
        $this->view->render('error/action-not-found');
    }
}
