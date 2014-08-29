<?php

/**
 * Description of IndexModel
 *
 * @author dionbosschieter
 */
class LoginModel extends BaseModel
{
    public $template = "login.tpl";
	  public $header = "loginheader.tpl";

    public function __construct($parameters)
    {
        //always call parent first
        parent::__construct($parameters);

        $this->sitetitle .= " << Login";
    }
}
