<?php
namespace app\modules\user\model;
use phpsf\lib\model;
class userModel extends model{
    public function getItem($id){
        return $this->db_get_all('SELECT * FROM demo WHERE id=:id',array(':id'=>$id));
    }
}