<?php
namespace lib;
class route{
    public $modules;
    public $controller;
    public $action;
    public function __construct(){
        $this->modules = $_REQUEST['m']?$_REQUEST['m']:'index';
        $this->controller = $_REQUEST['c'];
        $this->action = $_REQUEST['a'];
        pr($_REQUEST);
    }
}