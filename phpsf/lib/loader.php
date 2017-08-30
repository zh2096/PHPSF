<?php
namespace lib;

class loader{
    //自动加载类库
    static public function load($class){
        $class = str_replace('\\','/',$class);
        $file = ROOT_PATH.'/'.$class.'.php';
        if(is_file($file)){
            include_once $file;
        }else{
            throw new \Exception('loader:file not exist('.$file.')');
        }
    }
}