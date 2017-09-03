<?php
/*
 * 控制器基础类
 */
namespace phpsf\lib;

class base{
    public $assign;
    public function assign($name,$value){
        $this->assign[$name] = $value;
    }

    public function display($tplName=''){
        global $_CONTEXT;
        if($tplName){
            $name = explode('/',$tplName);
            $count = count($name);
            if($count == 1 ){
                $groupName = $_CONTEXT['route']['controller'];
                $fileNmae = $name[0];
            }elseif($count == 2){
                list($groupName,$fileNmae) = $name;
            }else{
                throw new \Exception('display :file not found('.$tplName.')');
            }
        }else{
            $groupName = $_CONTEXT['route']['controller'];
            $fileNmae = $_CONTEXT['route']['action'];
        }

        $file = $_CONTEXT['moduleDir'].'/tpl/'.$groupName.'/'.$fileNmae.'.html';
        if(is_file($file)){
            extract($this->assign);
            include $file;
        }else{
            throw new \Exception('display :file not found('.$file.')');
        }
    }
}