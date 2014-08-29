<?php

/**
 * IndexController main page
 *
 * @author dionbosschieter
 */
class IndexController extends BaseController {

  public function __construct($model) {
    //always call parent first
    $this->_specialPage = true;	
    parent::__construct($model);
    $this->_model->pagecontext .= " page-home";
  }

  public function indexAction() {

  }

}
