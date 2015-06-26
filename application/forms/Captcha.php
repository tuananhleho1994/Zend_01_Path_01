<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 6/23/2015
 * Time: 3:48 PM
 */
class Application_Form_Captcha{
    public static function isValid($dataCaptcha){
        $captchaID = $dataCaptcha['id'];
        $captchaInput = $dataCaptcha['input'];

        $captchaSession = new Zend_Session_Namespace('Zend_Form_Captcha_'.$captchaID);
        $captchaWord = $captchaSession->getIterator();
        if(isset($captchaWord['word']) && $captchaInput == $captchaWord['word']){
            return true;
        }
        return false;
    }
}