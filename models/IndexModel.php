<?php

/**
 * Description of IndexModel
 *
 * @author dionbosschieter
 */
class IndexModel extends BaseModel
{   
    public $template = "home.tpl";
    
    public function __construct($parameters)
    {
        //always call parent first
        parent::__construct($parameters);
        
        $this->sitetitle .= " << Home";
    }
}
