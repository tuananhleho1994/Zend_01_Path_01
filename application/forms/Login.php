<?php

class Application_Form_Login extends Zend_Form {

     public function init() {
        /* Form Elements & Other Definitions Here ... */
        $this->setMethod("post");
        $this->addElement(
                'text',
                'username',
                array(
                    'label' =>  'Username',
                    'required'  =>  true,
                    'filters'   =>  array('StringTrim'),
                )
        );
        $this->addElement(
                'password',
                'password',
                array(
                    'label' =>  'Password',
                    'required'  =>  true,
                    'filters'   =>  array(
                        'StringTrim'
                    )
                ));
        $this->addElement(
                'submit',
                'login',
                array(
                    'ignore'    =>  true,
                    'label' =>  'Login',
                ));
    }

}
