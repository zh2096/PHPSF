<?php
namespace lib;

class route{
    public $routeInfo;
    public function __construct($request_uri){
        //todo 根据$request_uri路由
        $this->routeInfo['module'] = $_REQUEST['m']?$_REQUEST['m']:'index';
        $this->routeInfo['controller'] = $_REQUEST['c']?$_REQUEST['c']:'index';
        $this->routeInfo['action'] = $_REQUEST['a']?$_REQUEST['a']:'index';
    }
}