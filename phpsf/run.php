<?php
defined('DEBUG') or define('DEBUG',false);
define('ROOT_PATH',dirname(__FILE__));
if(DEBUG){
    error_reporting(E_ALL);
    ini_set('display_errors','on');
} else ini_set('display_error','off');
include ROOT_PATH.'/func/common.php';
include ROOT_PATH.'/lib/loader.php';
spl_autoload_register('loader::load');

$app_path =  realpath(APP_PATH);
global $_CONF ;
$_CONF = include($app_path.'/conf/conf.php');

$route = new lib\route();
$module = $route->module;
$controller = $route->controller;
$action = $route->action;
$moduleDir = $app_path.'/modules/'.$module;
if(!is_dir($moduleDir))throw new \Exception('module not found : '.$module);
$ctrlFile = $moduleDir.'/ctrl/'.$controller.'Ctrl.php';
if(is_file($ctrlFile)){
    include $ctrlFile;
    $ctrl = 'modules\\'.$module.'\\'.ucfirst($controller).'Ctrl';
    $ctrl = new $ctrl();
    $ctrl->$action();
}else{
    throw new \Exception('controller not found : '.$ctrlFile);
}