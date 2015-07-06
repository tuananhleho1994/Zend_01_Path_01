<?php

/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 6/23/2015
 * Time: 3:06 PM
 */
class CaptchaController extends Zend_Controller_Action {

         public function imageAction() {
                  $form = new Application_Form_FormCaptchaImg(null, $this->view->baseUrl('/img/captcha/'));
                  $request = $this->getRequest();
                  if ($request->isPost()) {
                           $dataCaptcha = $request->getPost('captcha');
                           if (Application_Form_Captcha::isValid($dataCaptcha)) {
                                    echo "Upload thanh cong";
                                    return;
                           }
                           echo "Upload that bai";
                           return;
                  }

                  $this->view->form = $form;
                  $mask = APPLICATION_PATH . "/../public/img/captcha/*.png";
                  array_map("unlink", glob($mask));
         }

}
