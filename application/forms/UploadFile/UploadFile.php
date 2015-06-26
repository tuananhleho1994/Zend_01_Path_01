<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Form_UploadFile_UploadFile{
    public $_upload;
    public function __construct(){
        $this->_upload = new Zend_File_Transfer;
        $this->_upload->setDestination(APPLICATION_PATH.'/../public/file/');
    }
    public function setValidator()
    {
        $this->_upload->addValidator('Size',false,'400000');    //chỉ cho phép file có dung lượng
    }                                                                   //nhỏ hơn 40 KB  }

    public function addFilters(){
        $date = new DateTime();
        $this->_upload->addFilter('Rename',array('target'=>APPLICATION_PATH.'/../public/file/'.$date->format('Y-m-d H-i-s').'.jpg',
                                                    'overwrite' => true
                                                ));
    }
}

