<?php

/*
 * Bootstrap file, main file
 * This file gets called by index.php
 */

$route = Route::getInstance();

$route->add('/', 'index', array("default" => "index",));
$route->add('/view', 'index', array("default" => "index",));

/*
 * Login Pages
 */
$route->add('/login', 'login', array("default" => "index",));
$route->add('/login/:action', 'login', array("action" => 1, "default" => "index",));

/*
 Test pages
 */
 $route->add('/test', 'test', array("default" => "index",));
 $route->add('/test/:action', 'test', array("action" => 1, "default" => "view",));
 $route->add('/test/:hash/:action', 'test', array("telefoonnr" => 1, "action" => 2, "default" => "view",));

/*
 * Switch pages
 */
$route->add('/switch', 'switch', array("default" => "index",));
$route->add('/switch/:action', 'switch', array("action" => 1, "default" => "index",));
$route->add('/switch/:int/:action', 'switch', array("switchid" => 1,"action" => 2,));

/*
 * Location page
 */
$route->add('/locations', 'location', array("default" => "index",));

/*
 * Log pages
 */
$route->add('/log', 'log', array("default" => "index",));
$route->add('/log/:action', 'log', array("action" => 1, "default" => "index",));

/*
 * Switch Log
 */
$route->add('/switchlog', 'switchLog', array("default" => "index",));
$route->add('/switchlog/:action', 'switchLog', array("action" => 1, "default" => "index",));

/*
 * Users Pages
 */
$route->add('/users', 'user', array("default" => "index",));
$route->add('/users/:hash', 'user', array("username" => 1, "default" => "view",));


/*
 * Ajax/json pages
 */
$route->add('/ajax/:action', 'ajax', array("action" => 1, "default" => "more",));

if ($route->submit() == false) {
  $route->error();
}