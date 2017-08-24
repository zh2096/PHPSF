<?php
defined('DEBUG') or define('DEBUG',false);
define('ROOT_PATH',dirname(__FILE__));
if(DEBUG){
    error_reporting(E_ALL);
    ini_set('display_errors','on');
}
else ini_set('display_error','off');

include ROOT_PATH.'/common/func.php';
spl_autoload_register('load');
$route = new lib\route();

function load($class){
    //自动加载类库
    $class = str_replace('\\','/',$class);
    $file = ROOT_PATH.'/'.$class.'.php';
    if(is_file($file)){
        include_once $file;
    }else{
        return false;
    }
}