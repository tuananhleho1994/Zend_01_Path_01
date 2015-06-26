<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 6/23/2015
 * Time: 2:59 PM
 */
class Application_Form_FormCaptchaImg extends Zend_Form
{
    private $_captchaImgUrl;
    public function __construct($options = null, $captchaImgUrl)
    {
        $this->_captchaImgUrl = $captchaImgUrl;
        parent::__construct($options);
    }

    public function init(){
        $this->setMethod("post");
        $captcha = new Zend_Form_Element_Captcha('captcha',array(
            'label' => 'Captcha',
            'captcha' => array(
                'captcha' => 'Image',
                'wordLen' => 6,
                'timeout' => 300,
                'font' => APPLICATION_PATH.'/../public/font/VMELII.TTF',
                'imgDir' => APPLICATION_PATH.'/../public/img/captcha/',
                'imgUrl' =>  $this->_captchaImgUrl,
                'height' => 100,
                'width' => 200,
                'fontSize' => 25,
            ),
        ));
        $submit = $this->createElement('submit','Submit');

        $this->addElement($captcha)
            ->addElement($submit);
    }
}