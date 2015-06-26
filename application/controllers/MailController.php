<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 6/24/2015
 * Time: 11:42 AM
 */
class MailController extends Zend_Controller_Action
{
    public function sendMailAction(){
        $connmail = new Zend_Mail_Transport_Smtp('smtp.gmail.com', array ('auth' => 'login', 'username' => 'anhdt570@gmail.com', 'password' => 'dotuananh', 'ssl' => 'ssl', 'port' => 465 ) );
        Zend_Mail::setDefaultTransport( $connmail );
        $mail = new Zend_Mail( 'UTF-8' );
        $mail->setBodyHtml( 'noi dung' );
        $mail->addTo( 'tuananhleho1994@gmail.com' );
        $mail->setSubject( 'tieu de' );
        $mail->setFrom('anhdt570@gmail.com');
        $mail->send();
        echo "Done";
    }
}