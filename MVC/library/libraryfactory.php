<?php

namespace Library;

/**
 * Description of LibraryFactory
 *
 * @author Ionut
 */

class LibraryFactory{
    
    public static function create($object){
        
        $class = '\\Library\\' . ucfirst($object);
        
        return new $class();
    }
}
