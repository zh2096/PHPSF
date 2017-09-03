<?php
namespace phpsf\lib;

class model{
    public function get_db(){
        static $db;
        if(empty($db)){
            global $_CONTEXT;
            $db = new db($_CONTEXT['conf']['DB']);
        }
        return $db;
    }

    public function db_query($sql,$params=array()){
        return $this->get_db()->query($sql,$params);
    }
    public function db_get_all($sql,$params=array()){
        return $this->get_db()->get_all($sql,$params);
    }
}