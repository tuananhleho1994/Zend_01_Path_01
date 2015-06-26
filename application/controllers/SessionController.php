<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 6/25/2015
 * Time: 9:14 AM
 */
class SessionController extends Zend_Controller_Action{
    public function init(){
        Zend_Session::start();
    }
    public function example01Action(){
        $ses = new Zend_Session_Namespace('cart');
        $ses->name = "Laptop 01";
        $ses->price = "10.000.000 VND";
        $ses->number = array(
            'number01'  =>  100,
            'number02'  =>  200,
            'number03'  =>  300,
        );

        $dataSession = $ses->getIterator();
        echo "<pre>";
        print_r($dataSession);
        echo "</pre>";
        // echo $dataSession['name'];

        $this->noViewAction();
    }

    public function example02Action(){// get all elements in session to show.
        $ses = new Zend_Session_Namespace('cart');
        echo "<pre>";
        print_r($ses->getIterator());
        echo "</pre>";
        $this->noViewAction();
    }

    public function unsetEachElementInSessionAction(){// unset each element in session which defination
        $ses = new Zend_Session_Namespace('cart');
        $ses->setExpirationSeconds(5,'price');
        $this->noViewAction();
    }

    public function unsetAllAction(){// unset all elements in session.
        $ses = new Zend_Session_Namespace('cart');
        $ses->unsetAll();
        $this->noViewAction();
    }

    public function lockAction(){// when lock session then you can not write any valiable to session.
        $ses = new Zend_Session_Namespace('cart');
        $ses->lock();
        $ses->unlock();
        $ses->people = "Do Tuan Anh";
        $this->noViewAction();
    }

    public function countSessionAction(){
        $ses = new Zend_Session_Namespace('cart');
        $count = $ses->apply('count');
        echo $count;
        $this->noViewAction();
    }

    public function checkIsLockedAction(){
        $ses = new Zend_Session_Namespace('cart');
        $ses->lock();
        if($ses->isLocked()){// check session is locked.
            echo "Session is locked";
        }else{
            echo "Session is not locked";
        }
        $this->noViewAction();
    }

    private function noViewAction(){
        return $this->getHelper('viewRenderer')->setNoRender();
    }
}