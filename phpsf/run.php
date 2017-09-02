<?php
defined('DEBUG') or define('DEBUG',false);
defined('APP_PATH') or define('APP_PATH','./');
defined('APP_CONF_DIR') or define('APP_CONF_DIR','conf');
defined('APP_MOD_DIR') or define('APP_MOD_DIR','modules');
define('ROOT_PATH',dirname(__FILE__));
if(DEBUG){
    error_reporting(E_ALL);
    ini_set('display_errors','on');
} else ini_set('display_error','off');
//include ROOT_PATH.'/func/common.php';
//include ROOT_PATH.'/lib/loader.php';
//spl_autoload_register('lib\loader::load');//改成使用composer生成的自动加载文件
require ROOT_PATH.'/vendor/autoload.php';

$app_path =  realpath(APP_PATH);
global $_CONTEXT ;//全局上下文信息
$_CONTEXT['conf'] = include($app_path.'/'.APP_CONF_DIR.'/conf.php');

$route = new lib\route($_SERVER['REQUEST_URI']);
$_CONTEXT['route'] = $route->routeInfo;
$moduleDir = $app_path.'/'.APP_MOD_DIR.'/'.$_CONTEXT['route']['module'];
if(!is_dir($moduleDir))throw new \Exception('module not found : '.$_CONTEXT['route']['module']);
$_CONTEXT['moduleDir'] = $moduleDir;
$ctrlFile = $moduleDir.'/ctrl/'.$_CONTEXT['route']['controller'].'Ctrl.php';
if(is_file($ctrlFile)){
    include $ctrlFile;
    $ctrl = $_CONTEXT['route']['module'].'\\ctrl\\'.$_CONTEXT['route']['controller'].'Ctrl';
    $ctrl = new $ctrl();
    $ctrl->$_CONTEXT['route']['action']();
}else{
    throw new \Exception('controller not found : '.$ctrlFile);
}