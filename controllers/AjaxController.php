<?php

/**
 * Controller class for ajax calls
 *
 * @author dionbosschieter
 */
class AjaxController extends BaseController
{
    public function __construct($model)
    {
        //todo, disable view
        $this->_disableview = true;
        parent::__construct($model);
    }

    public function indexAction()
    {
        //index should't get called, WTF!
    }
}
