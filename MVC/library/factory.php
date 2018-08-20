<?php

namespace Library;

/**
 * Description of factory
 *
 * @author Ionut
 */
class Factory {
    
    public static function create($type = '', $object = ''){
        
        if(empty($type) || empty($object)){
            
            Factory::create('controler', 'error')->controllerNotFound();
        }
        else{
            
            switch ($type){
                case 'controler':
                    return ControllerFactory::create($object);
                    break;
                case 'model':
                    return ModelFactory::create($object);
                    break;
                case 'library':
                    return LibraryFactory::create($object);
                    break;
            }
        }
    }
}
