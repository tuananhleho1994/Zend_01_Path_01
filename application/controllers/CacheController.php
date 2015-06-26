<?php
class CacheController extends Zend_Controller_Action
{
    private function loadCacheAction(){
        $frontEndParam = array(
            'lifetime' =>  3600,//thời gian tồn tại của cache, giá trị null nghĩa là thời gian tồn tại vô hạn
            'automatic_serialization'  =>  true,//cho phép tự động serialize với các kiểu dữ liệu phức tạp
        );
        $backEndParam = array(
            'cache_dir'    =>   CACHE_DIR,// chỉ định vị trí thư mục cache.
        );

        return Zend_Cache::factory('Core','File',$frontEndParam,$backEndParam); // //khởi tạo một đối tượng $cache với cache frontend là Core, cache backend là File cùng các thông số tương ứng
    }
    public function listUserAction(){
        $cache_id = 'list_user';
        $cache = $this->loadCacheAction();
        if(!$cache->load($cache_id)){
            echo "Cache is not exist";
            $tableUser = new Application_Model_DbTable_Users();
            $dataAllUser = $tableUser->listUser();
            $cache->save($dataAllUser,$cache_id);
            $datalistUser = $cache->load($cache_id);
        }
        $datalistUser = $cache->load($cache_id);


//        echo "<pre>";
//        print_r($datalistUser);
//        echo "</pre>";
        foreach($datalistUser as $eachUser){
            echo $eachUser['username']."--------".$eachUser['name']."<br/>";
        }

        // $cache->remove($cache_id);
        return $this->getHelper('viewRenderer')->setNoRender();
    }

    public function cacheManagerAction(){
        $cache_id = 'list_user';
        $cache = $this->getInvokeArg('bootstrap')->getResource('CacheManager')->getCache('allUser');

        if(!$cache->load('list_user')){
            echo "Cache have a name that's list_user is not exist";
            $tableUser = new Application_Model_DbTable_Users();
            $dataAllUser = $tableUser->listUser();
            $cache->save($dataAllUser,$cache_id);
            $datalistUser = $cache->load($cache_id);
        }
        $datalistUser = $cache->load($cache_id);
        foreach($datalistUser as $eachUser){
            echo $eachUser['username']."--------".$eachUser['name']."<br/>";
        }
        return $this->getHelper('viewRenderer')->setNoRender();
    }
}