<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Form_CreateUser extends Zend_Form
{
          public function init(){
                //$username = new Zend_Form_Element_Text('username');

                    $this->setMethod('post');
                    $this->addElement('text','username',array(
                              'label'   =>        'Username',
                              'required'          =>        true,
                              'filters' => array(
                                  'StringTrim',
                              )
                    ));
                    
                    $this->addElement('password','password',array(
                              'label'   => 'Password',
                              'required' => true,
                              'filters' => array('StringTrim'),
                    ));
                    
                    $this->addElement('password','repassword',array(
                              'label'   => 'Password',
                              'required' => true,
                              'filters' => array('StringTrim'),
                    ));
                    
                    $this->addElement('text','name',array(
                              'label'   => 'Name',
                              'required' => true,
                              'filters' => array('StringTrim'),
                    ));
                    
                    $this->addElement('submit','confirm',array(
                              'label'   => 'Confirm',
                              'ignore'  => true,
                    ));
          }
}

