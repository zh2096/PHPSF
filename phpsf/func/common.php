<?php

function get_db(){
    static $_DB;
    if(empty($_DB)){
        global $_CONF;
        $_DB = new lib\db($_CONF);
    }
    return $_DB;
}

function db_query($sql,$params=array()){
    return get_db()->query($sql,$params);
}
function db_get_all($sql,$params=array()){
    return get_db()->get_all($sql,$params);
}

function pr($array){
    dump ($array, 1 , '<pre>', 0);
}

function dump($var, $echo=true, $label=null, $strict=true) {
    $label = ($label === null) ? '' : rtrim($label) . ' ';
    if (!$strict) {
        if (ini_get('html_errors')) {
            $output = print_r($var, true);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        } else {
            $output = $label . print_r($var, true);
        }
    } else {
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        if (!extension_loaded('xdebug')) {
            $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        }
    }
    if ($echo) {
        echo($output);
        return null;
    }else
        return $output;
}


