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
        //always call parent first
        $this->_specialPage = true;
        parent::__construct($model);
        
        //get oldest loaded item from the session
        $this->_model->user->setOldestItem($this->session->get("oldestItem"));
        $this->_model->user->setNewestItem($this->session->get("newestItem"));
    }
    
    public function moreAction()
    {
        $this->_model->newsArticles = $this->_model->user->getOlderCollection();
        $this->session->add("oldestItem", $this->_model->user->getOldestItem());
        $this->session->add("newestItem", $this->_model->user->getNewestItem());
    }
    
    public function indexAction() 
    {
        //index should't get called, WTF!
    }
}
