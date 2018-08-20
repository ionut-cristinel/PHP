<?php

require_once 'config/paths.php';

spl_autoload_register(function($classFullName){
    
    $class = str_replace('\\', '/', $classFullName);
    $class = strtolower($class);
    
    require_once $class . '.php';
});


use Library\Routing;

$link = (isset($_GET['url'])) ? $_GET['url'] : 'index/index';

new Routing($link);