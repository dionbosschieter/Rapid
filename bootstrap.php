<?php

/*
 * Bootstrap file, main file
 * This file gets called by index.php
 */

$route = Route::getInstance();

$route->add('/', 'HomeController', ["default" => "index"]);
$route->add('/api', 'ApiController', ["default" => "index"]);

/*
 * Login Pages
 */
$route->add('/login', 'LoginController', ["default" => "index"]);
$route->add('/login/:action', 'LoginController', ["action" => 1, "default" => "index"]);

if ($route->submit() == false) {
  $route->error();
}
