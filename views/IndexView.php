<?php

/**
 * Description of IndexView
 *
 * @author dionbosschieter
 */
class IndexView extends BaseView {

  public function __construct($model, $controller) {
    parent::__construct($model, $controller);
  }

  public function renderContent() {
    $this->_renderTemplate($this->_model->template);
  }

}
