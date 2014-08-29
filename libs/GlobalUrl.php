<?php

/**
 * Global URL, Defines SiteRoot and all global links
 *
 * @author dionbosschieter
 */
class GlobalUrl
{
    const SITEROOT = "/werktgoed";

    //sections
    const SECTION_HOME = "view";
    const SECTION_USERS = "users";
    const SECTION_LOG = "log";

    //Basic actions
    const ACTION_VIEW = "view";
    const ACTION_EDIT = "edit";
    const ACTION_DELETE = "delete";
    const ACTION_CREATE = "create";
    const ACTION_RESET = "reset";
    const ACTION_REFRESH = "refresh";
    const ACTION_CLEAR = "clear";
    const ACTION_TEST = "test";

    //groupController actions
    const ACTION_ARCHIVE = "archive";
    const ACTION_EXPORTRESULT = "exportresult";
    const ACTION_EXPORTGROUP = "exportgroup";
    const ACTION_GROUPRESET = "groupreset";


    public static function redirect($url)
    {
        header("Location: ".implode('/', $url));
        exit();
    }

    public static function getUrl($url)
    {
      (array)$url;
      return implode('/', $url);
    }
}
