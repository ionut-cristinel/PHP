<?php

namespace Library;

/**
 * Description of view
 *
 * @author Ionut
 */
class View {
    
    public function __construct() {
        
    }
    
    public function render($viewName){

        require_once 'views/head.php';
        require_once 'views/header.php';
        require_once 'views/' . $viewName . '.php';
        require_once 'views/footer.php';
    }
}
