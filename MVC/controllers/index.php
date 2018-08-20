<?php

namespace Controllers;

/**
 * Description of index
 *
 * @author Ionut
 */
class Index extends \Library\Controller{
    
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        
        $this->view->render('index/index');
    }
}
