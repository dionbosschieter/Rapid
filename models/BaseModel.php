<?php

/**
 * Base Model
 *
 * @author dionbosschieter
 */

class BaseModel
{

    public $sitetitle;
    public $pagecontext = "";
    public $sitename;
    public $user;
    public $infomessage;
    public $session;
    public $parameters;

    public $header = "header.tpl";
    public $footer = "footer.tpl";

    public function __construct($parameters)
    {
        $this->parameters = $parameters;
        $this->sitetitle = "WerktGoed";
        $this->sitename = "WerktGoed";
    }
}
