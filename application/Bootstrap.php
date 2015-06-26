<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initSession(){
        Zend_Session::start();
    }

    protected function _initDatabase(){
        $db = $this->getPluginResource('db')->getDbAdapter();
        Zend_Registry::set('db',$db);
    }

    protected function _initCacheManager(){
        $allUser = array(
            'frontend' => array(
                'name'  =>  'Core',
                'options'   =>  array(
                    'lifetime'  =>  3600,
                    'automatic_serialization'   =>  true,
                ),
            ),
            'backend'   =>  array(
                'name'  =>  'File',
                'options'   =>  array(
                    'cache_dir' =>  CACHE_DIR.'manager/',
                ),
            ),
        );
        $cacheManager = new Zend_Cache_Manager();
        $cacheManager->setCacheTemplate('allUser',$allUser);
        return $cacheManager;
    }
}

