<?php

namespace Library;

/**
 * Description of data-base
 *
 * @author Ionut
 */
class Database{
    
    const TYPE      = 'mysql';
    const SERVER    = 'localhost';
    const USER      = 'root';
    const PASSWORD  = '';
    const DATABASE  = 'mvc';
    
    private static $instance;
    private $_mysql;

    private function __construct() {
        try{
            $this->_mysql = new \PDO(Database::TYPE . ':host=' . Database::SERVER . ';dbname=' . Database::DATABASE, Database::USER, Database::PASSWORD);
            $this->_mysql->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo 'Database connection failure: ' . $e->getMessage();
        }
    }
    
    public static function getInstance(){
        if(!isset(self::$instance)){
            $instance = new Database();
            self::$instance = $instance->_mysql;
        }
        return self::$instance;
    }
}
