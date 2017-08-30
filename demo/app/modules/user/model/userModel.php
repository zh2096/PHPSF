<?php
namespace user\model;
use lib\model;
class userModel extends model{
    public function getItem($id){
        return $this->db_get_all('SELECT * FROM demo WHERE id=:id',array(':id'=>$id));
    }
}