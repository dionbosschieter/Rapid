<?php

/**
 * Base Overloaded Controller
 *
 * @author dionbosschieter
 */
abstract class BaseController {

    protected $_model;
    protected $_specialPage;

    public function __construct($model)
    {
        $this->_model = $model;
        $this->session = new Session();
        $this->_model->user = new User();
        if($this->session->get("level")) {
            $this->_model->user->load($this->session->get("level"),
            $this->session->get("samaccountname"),
            $this->session->get("displayname"));
        }

        if(!$this->_model->user->getLoggedIn()) header("Location: /login");
    }

    abstract public function indexAction();
}
