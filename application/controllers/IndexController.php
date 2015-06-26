<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $contextSwitch = $this->_helper->getHelper('contextSwitch');
        $contextSwitch->addActionContext('user', 'xml')
            ->initContext();
    }

    public function indexAction()
    {

    }

    public function userAction()
    {
        // action body
    }

    public function loginAction()
    {
        // action body
    }


}





