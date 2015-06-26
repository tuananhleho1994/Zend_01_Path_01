<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 6/25/2015
 * Time: 10:45 AM
 */
class ZendAclController extends Zend_Controller_Action{
    private $_acl;
    public function init(){
        parent::init();
        $this->_helper->viewRenderer->setNoRender();

        $acl = new Zend_Acl();

        $acl->addRole(new Zend_Acl_Role('Guest'))
            ->addRole(new Zend_Acl_Role('Member'),'Guest')
            ->addRole(new Zend_Acl_Role('Manager'),'Member')
            ->addRole(new Zend_Acl_Role('Administrator'));

        $guestRole = array('index','view');
        $memberRole = array('add');
        $managerRole = array('edit');
//        $administratorRole = array('delete');

        $acl->addResource(new Zend_Acl_Resource('zend-acl'))
            ->addResource(new  Zend_Acl_Resource('users'));


        $acl->allow('Guest','zend-acl',$guestRole);
        $acl->allow('Member','zend-acl',$memberRole);
        $acl->allow('Manager','zend-acl',$managerRole);
        $acl->allow('Administrator');

        $this->_acl = $acl;
//        echo "<pre>";
//        print_r($acl);
//        echo "</pre>";
    }

    public function indexAction(){
        $request = $this->getRequest();
        $nameAction = $request->getActionName();
        $nameController = $request->getControllerName();
        echo "Action: ".$nameAction."<br>";
        echo "Controller: ".$nameController."<br>";
        echo "Module: ".$request->getModuleName()."<br>";

        echo $this->_acl->isAllowed('Guest',$nameController,$nameAction) ? 'allowed' : 'denied';
    }

    public function viewAction(){
        $request = $this->getRequest();
        $nameControler = $request->getActionName();
        echo "Action: ".$nameControler."<br>";
        if($this->_acl->isAllowed('Guest',null,$nameControler)){
            echo "Allowed";
        }else{
            echo "Denied";
        }
    }

    public function addAction(){
        $request = $this->getRequest();
        $nameControler = $request->getActionName();
        echo "Action: ".$nameControler."<br>";
        echo $this->_acl->isAllowed('Guest',null,$nameControler) ? 'allowed' : 'denied';
    }

    public function editAction(){
        $request = $this->getRequest();
        $nameControler = $request->getActionName();
        echo "Action: ".$nameControler."<br>";
    }

    public function deleteAction(){
        $request = $this->getRequest();
        $nameControler = $request->getActionName();
        echo "Action: ".$nameControler."<br>";
        echo $this->_acl->isAllowed('Manager',null,$nameControler) ? 'allowed' : 'denied';
    }

    public function demoAction(){
        $request = $this->_request;
        $request->setActionName('index');
        $request->setControllerName('zend-acl');
        $request->setModuleName('default');
        return;
    }
}