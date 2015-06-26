<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 6/24/2015
 * Time: 4:34 PM
 */
// http://devzone.zend.com/1692/zend-framework-mvc-request-lifecycle/

class Application_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{
    public function routeStartup(Zend_Controller_Request_Abstract $request)
    {
        $this->getResponse()
            ->appendBody("<p>routeStartup() called</p>\n");
    }

    public function routeShutdown(Zend_Controller_Request_Abstract $request)
    {
        $this->getResponse()
            ->appendBody("<p>routeShutdown() called</p>\n");
        $controllerName = $request->getControllerName();
        $actionName = $request->getActionName();
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){
            echo "You are logined";
        }else{
//            $request->setModuleName('default');
//            $request->setControllerName('users');
//            $request->setActionName('delete');
//            return;
            if($controllerName != "users" && $actionName != "delete") {
                $r = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                $r->gotoSimple('delete', 'users', 'default')->redirectAndExit();
            }
        }
    }

    public function dispatchLoopStartup(
        Zend_Controller_Request_Abstract $request)
    {
        $this->getResponse()
            ->appendBody("<p>dispatchLoopStartup() called</p>\n");
    }

    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $this->getResponse()
            ->appendBody("<p>preDispatch() called</p>\n");
    }

    public function postDispatch(Zend_Controller_Request_Abstract $request)
    {
        $this->getResponse()
            ->appendBody("<p>postDispatch() called</p>\n");
    }

    public function dispatchLoopShutdown()
    {
        $this->getResponse()
            ->appendBody("<p>dispatchLoopShutdown() called</p>\n");
    }
}