<?php

if(true) {
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);
}

function __autoload($class_name) {
    //string substr ( string $string , int $start [, int $length ] )
    if(substr($class_name, -5) == "Model") $prefix = "models/";
    else if(substr($class_name, -4) == "View") $prefix = "views/";
    else if(substr($class_name, -10) == "Controller") $prefix = "controllers/";
    else if(substr($class_name, 0, 6) == "Global") $prefix = "libs/";
    else return false;
    include $prefix . $class_name . '.php';
}

require_once 'libs/Route.php';
require_once 'libs/DB.php';
require_once 'libs/Session.php';
require_once 'libs/User.php';

//call bootstrap
require_once 'bootstrap.php';

define('SITEROOT', GlobalUrl::SITEROOT);
