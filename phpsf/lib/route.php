<?php
namespace lib;

class route{
    public $module;
    public $controller;
    public $action;
    public function __construct(){
        $this->module = $_REQUEST['m']?$_REQUEST['m']:'index';
        $this->controller = $_REQUEST['c']?$_REQUEST['c']:'index';
        $this->action = $_REQUEST['a']?$_REQUEST['a']:'index';
    }
}