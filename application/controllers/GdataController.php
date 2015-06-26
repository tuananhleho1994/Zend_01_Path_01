<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 6/23/2015
 * Time: 4:52 PM
 */
class GdataController extends Zend_Controller_Action
{
    public function youtubeAction()
    {
        $username = "Entertainment";

        $youtube = new Zend_Gdata_YouTube();
        try {
            $feed = $youtube->getUserUploads($username);
        }catch (Exception $e){
            echo $e->getMessage();
            exit;
        }
    }
}