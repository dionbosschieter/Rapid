<?php

/**
 * Description of route
 *
 * @author dionbosschieter
 */
class Route {

    private $_uri = array();

    private $_model = array();
    private $_controller = array();
    private $_view = array();
    private $_options = array();

    protected static $instance;

    /**
     * Gets the instance of Route(), Singleton pattern
     * @return Route() object
     */
    public static function getInstance() {
        if(!isset(self::$instance)) {
            self::$instance = new Route;
        }

        return self::$instance;
    }

    /**
     * Build a collection of internal url's to look for
     *
     * Anonymous function possible
     * add('/anonymous', function() {
     *      echo "This is a anonymous function, implemented in PHP 5.3";
     *  });
     *
     * @param type $uri
     */
    public function add($uri, $name, $array)
    {
        $uri = str_replace(":action", "([a-zA-Z0-9_-]+)", $uri);
        $uri = str_replace(":int", "([0-9]+)", $uri);
        $uri = str_replace(":hash", "([0-9a-z]+)", $uri);

        $this->_uri[] = $uri;
        $this->_controller[] = $name;

        $this->_options[] = $array;
    }

    /**
     * Default routing error function
     * calls default error page
     */
    public function error()
    {
        $controller = new ErrorController();
        $controller->action404();
    }

    /**
     * Gets the browsing path of the client
     */
    public function submit()
    {
        $uriGetParam = isset($_GET['uri']) ? '/' . trim($_GET['uri'],'/') : '/';

        foreach($this->_uri as $key => $value)
        {
            if(preg_match("#^$value$#", $uriGetParam, $matches)) {
                $parameters = array();

               foreach($this->_options[$key] as $optionvalue => $optionkey)
                {
                    if(is_int($optionkey)) {
                        $parameters[$optionvalue] = $matches[$optionkey];
                    }
                }

                //check for action or set default action
                if(!isset($parameters["action"])) {
                    $parameters["action"] = $this->_options[$key]["default"];
                }

                $controller = $this->_controller[$key];
                $action = $parameters["action"];

                // echo "calling $controller with action $action";
                // return true;

                $controller = new $controller();

                //default controller action
                if($action != "") {
                    $controller->{$action."Action"}();
                } else {
                    $action = "index";
                    $controller->indexAction();
                }

                return true;
            }

        }
    }
}
