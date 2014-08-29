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

  private function __construct()
  {
    //init connection
    $dsn = "mysql:host=localhost;port=3306;dbname=dbname;";

    try {
      $this->_dbh = new PDO($dsn,"username","password");
    } catch (PDOException $ex) {
      echo $ex->getMessage();
    }

    //PDO class
    $this->_dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $this->_dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
  }

  public function getDB()
  {
    return $this->_dbh;
  }
}
