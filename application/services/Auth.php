<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Service_Auth{
    
    public function auth($dbAdapter, $username, $password){
        $adapter = new Zend_Auth_Adapter_DbTable(
                $dbAdapter,
                'users',
                'username',
                'password'
                );
                
        $adapter->setIdentity($username);
        $adapter->setCredential($password);
        
        $auth = Zend_Auth::getInstance();
        $result = $auth->authenticate($adapter);
        if($result->isValid()){
            return true;
        }
        return false;
    }
}
