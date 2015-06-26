<?php

class Application_Form_Register extends Zend_Form
{

    public function init()
    {
        $this->setAction("post");
        $this->addElement('text','username',array(
            'label' =>  'Username',
            'required'  => true,
            'filters'   => array('StringTrim')
        ));
        
        $this->addElement('password','password',array(
            'label' =>  'Password',
            'required'  =>  true,
            'filters'   =>  array('StringTrim')
        ));
        
        $this->addElement('password','repassword',array(
            'label' =>  'Password',
            'required'  =>  true,
            'filters'   =>  array('StringTrim')
        ));
        
        $this->addElement('text','name',array(
            'label' =>  'Name',
            'required'  =>  true,
            'filters'   =>  array('StringTrim')
        ));
        $this->addElement('submit','register',array(
            'label' =>  'Register',
            'ignore'    =>  true
        ));
    }


}

