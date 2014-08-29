<?php

/**
 * LoginController loginpage
 *
 * @author dionbosschieter
 */
class LoginController extends BaseController {

  public function __construct($model) {
    //always call parent first
    parent::__construct($model);

    //redirect if user is logged in
    // if($this->_model->user->getLoggedIn()) {
    // 	GlobalUrl::redirect(array(GlobalUrl::SITEROOT, GlobalUrl::SECTION_HOME));
    // }
  }

  public function indexAction() {

  }

  public function doAction() {
  	$username = $_POST["username"];
  	$password = $_POST["password"];
  }

}
