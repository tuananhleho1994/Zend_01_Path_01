<?php

class UsersController extends Zend_Controller_Action {

    public function init() {
                    /* Initialize action controller here */
    }

    private function _factoryUserService(){
        $tableUser = new Application_Model_DbTable_Users();

    }

    public function indexAction() {
        $currentPage = $this->getRequest()->getParam("page",1);
        $userTable = new Application_Model_DbTable_Users();

        $adapter = new Zend_Paginator_Adapter_DbSelect($userTable->listAllUser());
        $paginator = new Zend_Paginator($adapter);
        $paginator->setItemCountPerPage(2);
        $paginator->setPageRange(3);
        $paginator->setCurrentPageNumber($currentPage);

        $this->view->paginator = $paginator;
    }

    public function createAction() {
                   // action body
        $formCreateUser = new Application_Form_CreateUser();
        $this->view->formCreateUser = $formCreateUser;
        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($formCreateUser->isValid($request->getParams())) {
                $dataFormFiltered = $formCreateUser->getValues();
                $userTable = new Application_Model_DbTable_Users();
                $userTable->insert($dataFormFiltered);
                echo "Success";
            }
//                        echo "<pre>";
//                        print_r($request->getParams());
//                        echo "</pre>";
        }
    }

    public function editAction() {
                    // action body
        echo "action: edit";
        sleep(10);
        return $this->_redirect('users/delete');
    }

    public function deleteAction() {
                    // action body
        echo "action: delete";
        $arrParam = $this->_request->getParams();
        echo "<pre>";
        print_r($arrParam);
        echo "</pre>";
    }

}
