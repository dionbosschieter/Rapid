<?php

/**
 * Session class, you can register objects
 * get items and add items
 *
 * @author dionbosschieter
 */
class Session 
{
    
    public function __construct() 
    {
        session_start();
    }
    
    public function register($name, $object)
    {
        $_SESSION[$name] = serialize((object) $object);
    }
    
    public function getRegistered($name)
    {
        return unserialize($_SESSION[$name]);
    }
    
    public function add($name, $value)
    {
        $_SESSION[$name] = $value;
    }
    
    public function get($name)
    {
        if(isset($_SESSION[$name])) return $_SESSION[$name];
        else return false;
    }
}
