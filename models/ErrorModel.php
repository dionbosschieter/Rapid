<?php

/**
 * Basic ErrorController
 *
 * @author dionbosschieter
 */
class ErrorModel extends BaseModel
{
    public $content404 = "error.tpl";
    
    public function __construct()
    {
    	$parameters = "";
        //always call parent first
        parent::__construct($parameters);
        
        $this->sitetitle = "Error 404";
    }
}
