<?php

/**
 * Description of ErrorView default error page
 *
 * @author dionbosschieter
 */
class ErrorView extends BaseView
{
    public function __construct($model, $controller) {
        parent::__construct($model, $controller);
    }
    
    public function render()
    {
        $this->renderHeader();
        $this->renderContent();
        $this->renderFooter();
    }
    
    public function renderContent()
    {
        $this->_renderTemplate($this->_model->content404);
    }
}
