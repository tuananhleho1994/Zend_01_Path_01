<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Form_UploadFile extends Zend_Form
{
          public function init(){
                    $this->setMethod('post');
                    
                    $this->setAttrib('enctype', 'multipart/form-data');
                    
                    $this->addElement('file','file',array(
                              'label'   =>        'Choose a file',
                    ));
                    
                    $this->addElement('submit', 'confirm', array(
                              'label'   =>        'Upload',
                              'ignore'  =>        true,
                    ));
          }
}