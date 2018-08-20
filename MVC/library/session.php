<?php

namespace Library;

/**
 * Description of session
 *
 * @author Ionut
 */
class Session {
    
    public static function init(){
        
        session_start();
    }
    
    public static function set($index, $value){
        
        $_SESSION[$index] = $value;
    }
    
    public static function get($index){
        
        if(isset($_SESSION[$index])){
            
            return $_SESSION[$index];
        }
        return FALSE;
    }
    
    public static function destroy(){
        
        session_unset();
        session_destroy();
    }
}
