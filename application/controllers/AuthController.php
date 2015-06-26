<?php
class AuthController extends Zend_Controller_Action {

          public function init() {
                    /* Initialize action controller here */
              $this->view->headTitle("Zend Framework - Authenticate");

              $layout = array(
              'layout'  => 'myLayout',
              'layoutPath'  =>  APPLICATION_PATH.'/layouts/scripts'
              );
              Zend_Layout::startMvc($layout);
          }

          public function indexAction() {
                    echo "Hello this is action index in AuthController";
                    echo "<a href='" . $this->getRequest()->getBaseUrl() . "/auth/logout'>Logout</a>";
          }

          public function loginAction() {

                    $loginForm = new Application_Form_Login;
                    $this->view->formLogin = $loginForm;

                    $authenticate = new Application_Service_Auth;
                    if (!$this->getRequest()->isPost()) {
                              return;
                    }

                    if ($loginForm->isValid($this->getRequest()->getPost())) {
                              $dataFilteredForm = $loginForm->getValues();
                              $dbAdapter = $this->getInvokeArg("bootstrap")->getResource('db');
                              $username = $loginForm->getValue("username");
                              $password = $loginForm->getValue("password");
                              if ($authenticate->auth($dbAdapter, $username, $password)) {
                                        $this->_helper->FlashMessenger('Success Login');
                                        $this->redirect('auth/index');
                                        return;
                              }
                    }
          }

          public function registerAction() {
                    // action body
                    $formRegister = new Application_Form_Register;
                    $this->view->formRegister = $formRegister;

                    $request = $this->getRequest();
                    if ($request->isPost()) {
                              $dataFormRegister = $request->getParams();

                              if ($formRegister->isValid($dataFormRegister)) {
                                        $dataFormFilteredRegister = array(
                                            'username' => $formRegister->getValue('username'),
                                            'password' => $formRegister->getValue('password'),
                                            'password_salt' => $formRegister->getValue('password'),
                                            'name' => $formRegister->getValue('name'),
                                        );
                                        $tableUser = new Application_Model_DbTable_Users;
                                        $tableUser->insert($dataFormFilteredRegister);
                                        $this->_helper->FlashMessenger('Chúc mừng bạn đã đăng ký thành công');
                                        return $this->redirect('auth/registered');
                              }
                    }
          }

          public function registeredAction() {
                    // action body
                    $flashMessenger = $this->_helper->getHelper('FlashMessenger');
                    $dataMessages = $flashMessenger->getMessages();
                    foreach ($dataMessages as $message) {
                              echo $message;
                    }
                    echo "<br/><a href='" . $this->getRequest()->getBaseUrl() . "/auth/login'>Đăng nhập</a>";
          }

          public function logoutAction() {
                    // action body
                    $auth = Zend_Auth::getInstance();
                    if ($auth->hasIdentity()) {
                              $auth->clearIdentity();
                    }
                    return $this->redirect('auth/login');
          }

          public function checkloginAction() {
                    $auth = Zend_Auth::getInstance();
                    if ($auth->hasIdentity()) {// check logined
                              $identity = $auth->getIdentity();
                              echo $identity;
                    }
          }

}
