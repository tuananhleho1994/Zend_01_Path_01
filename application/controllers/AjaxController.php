<?php

/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 6/23/2015
 * Time: 11:42 AM
 */
class AjaxController extends Zend_Controller_Action {

         public function init() {
                  $base = $this->_request->getBaseUrl();
                  $this->view->base = $base;
                  $this->view->headScript()->appendFile($base . "/js/jquery-1.11.3.min.js", 'text/javascript');

                  $this->view->baseUrlAjax = APPLICATION_PATH;
         }

         public function linkAction() {
                  
         }

         public function getLinkAction() {
                  $value = $this->getRequest()->getParam('id');
//        echo $value;
                  $data = array(
                      'name' => 'Do Tuan Anh ' . $value,
                      'school' => 'HN National University',
                      'age' => 18,
                  );
                  $this->_helper->json($data);
         }

         public function numberOneAction() {
                  sleep(3);
                  $this->_helper->json(array('a' => 1));
         }

         public function numberTwoAction() {
                  sleep(5);
                  $this->_helper->json(array('a' => 2));
         }

}
