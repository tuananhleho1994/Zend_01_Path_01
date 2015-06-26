<?php

class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract {

    protected $_name="users";
    protected $_primary="id";
    protected $_db;
    public function __construct(){
        $this->_db = Zend_Registry::get('db');
    }
    public  function listAllUser() {
//        return $this->fetchall()->toArray();
        $query = $this->select();
        $query->from($this->_name);
        return $query;
    }

    public function listUser(){
        $sql = $this->_db->query('select * from users');
        return $sql->fetchAll();
    }

    public function listUser01(){
        $query = $query = $this->select();
        $query->from($this->_name)->toArray();
        return $query;
    }

}
