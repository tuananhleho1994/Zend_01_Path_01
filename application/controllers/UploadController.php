<?php

class UploadController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $date = new Zend_Date();
        echo $date->get();
    }

    public function uploadAFileAction()
    {
        $formUploadAFile = new Application_Form_UploadFile();
        $this->view->formUploadAFile = $formUploadAFile;
        $request = $this->getRequest();
        if($request->isPost()){
            $upload = new Application_Form_UploadFile_UploadFile();
            $files = $upload->_upload->getFileInfo();

           // $upload->setValidator();
            $upload->addFilters();
            foreach($files as $file => $infoFile){
                if(!$upload->_upload->isUploaded($file)){
                    echo "Ban chua upload file";
                }
                if(!$upload->_upload->isValid($file)){
                    echo "File khong hop le";
                }
            }
            if($upload->_upload->receive()){
                echo "Upload thanh cong";
            }
       }
    }
}



