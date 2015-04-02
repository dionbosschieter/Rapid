<?php

class HomeController extends BaseController {

  public function indexAction() {
    $this->render('home');
  }

  public function testAction() {
    $this->_model->coolvalue = $this->_model->parameters["specialvalue"];
    $this->_model->headingtext = "Test";
    $this->_model->template = "indextest.tpl";
  }

}
