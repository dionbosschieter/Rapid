<?php

/**
 * Base OverloadedView
 *
 * @author dionbosschieter
 */
abstract class BaseView
{
    protected $_model;
    protected $_controller;

    public function __construct($model, $controller)
    {
        $this->_controller = $controller;
        $this->_model = $model;
    }

    public function renderHeader()
    {
        $this->_renderTemplate($this->_model->header);
    }

    public function renderFooter()
    {
        $this->_renderTemplate($this->_model->footer);
    }

    public function render()
    {
        $this->renderHeader();
        if($this->_model->infomessage) {
            $this->renderInfoMessage($this->_model->infomessage);
        }
        $this->renderContent();
        $this->renderFooter();
    }

    public function renderInfoMessage($message)
    {
        echo "<div class='infomessage'>";
        echo $message;
        echo "</div>";
    }

    protected function _renderTemplate($templatefile)
    {
        include 'templates/'.$templatefile;
    }

    protected function renderMenuBox()
    {
        ?>
        <div class="navbar-collapse collapse menuBox">
          <ul class="nav navbar-nav">
            <li><a class="navbar-home" href="<?php echo GlobalURL::SITEROOT; ?>/">home</a></li>
            <li><a class="navbar-gebruikers" href="<?php echo GlobalURL::getUrl(array(GlobalURL::SITEROOT, GlobalUrl::SECTION_USERS)); ?>/">Gebruikers</a></li>
          </ul>
        </div>
        <?php
    }


    abstract public function renderContent();
}
