<?php

/**
 * Description of DB
 *
 * @author dionbosschieter
 */
class DB
{
    
    private $_dbh;
    protected static $instance;
    
    public static function getInstance() {
        if(!isset(self::$instance)) {
            self::$instance = new DB;
        }
        
        return self::$instance;
    }
    
    private function __construct() {

        //init connection
        $dsn = "sqlsrv:Server=".GGDConfig::DBSERVER;
        $dsn.= ";Database=".GGDConfig::DBNAME.";";

		try {
		    $this->_dbh = new PDO($dsn,GGDConfig::DBUSER,GGDConfig::DBPASS);
            
            //PDO class
            $this->_dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $this->_dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
		} catch (PDOException $ex) {
		    echo $ex->getMessage();
		}
		
    }
    
    public function getDB()
    {
        return $this->_dbh;
    }
}
