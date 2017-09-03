<?php
/*
 * 公共函数
 */
function model($model){
    global $_CONTEXT;
    static $_model;
    if(empty($_model[$model])){
        include $_CONTEXT['moduleDir'].'/model/'.$model.'Model.php';
        $modelName = basename(APP_PATH).'\\'.APP_MOD_DIR.'\\'.$_CONTEXT['route']['module'].'\\model\\'.$model.'Model';
        $_model[$model] = new $modelName();
    }
    return $_model[$model];
}


//function pr($array){
//    dump ($array, 1 , '<pre>', 0);
//}
//
//function dump($var, $echo=true, $label=null, $strict=true) {
//    $label = ($label === null) ? '' : rtrim($label) . ' ';
//    if (!$strict) {
//        if (ini_get('html_errors')) {
//            $output = print_r($var, true);
//            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
//        } else {
//            $output = $label . print_r($var, true);
//        }
//    } else {
//        ob_start();
//        var_dump($var);
//        $output = ob_get_clean();
//        if (!extension_loaded('xdebug')) {
//            $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
//            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
//        }
//    }
//    if ($echo) {
//        echo($output);
//        return null;
//    }else
//        return $output;
//}


