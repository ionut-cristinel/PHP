<?php

namespace Library;

/**
 * Description of model
 *
 * @author Ionut
 */
class Model {
    
    public $dataBase;
    
    public function __construct() {
        
        $this -> dataBase = \Library\Database::getInstance();
    }
}
