<?php

abstract class BaseController {

    protected function render($viewName)
    {
        include __DIR__ . '/../views/' . $viewName . '.tpl';
    }

}
