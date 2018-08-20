<?php

namespace Library;

/**
 * Description of ModelFactory
 *
 * @author Ionut
 */
class ModelFactory{
    
    public static function create($object){
        
        $class = '\\Models\\' . ucfirst($object);
        
        return new $class();
    }
}
