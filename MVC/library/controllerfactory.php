<?php

namespace Library;

/**
 * Description of ControllerFactory
 *
 * @author Ionut
 */

class ControllerFactory{
    
    public static function create($object){
        
        $class = '\\Controllers\\' . ucfirst($object);
        
        return new $class();
    }
}
