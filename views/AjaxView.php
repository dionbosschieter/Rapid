<?php

/**
 * Description of AjaxView
 *
 * @author dionbosschieter
 */
class AjaxView 
{
    private $_model;
    private $_controller;
    
    public function __construct($model, $controller) 
    {
        header('Content-Type: application/json');
        $this->_controller = $controller;
        $this->_model = $model;
    }
    
    public function render()
    {
        echo json_encode($this->_model->newsArticles, JSON_PRETTY_PRINT);
    }
}
