<?php
namespace user\ctrl;
use lib\base;

class IndexCtrl extends base {
    public function index(){
        $item = model('user')->getItem(2);
        $this->assign('info',$item);
        $this->display();
    }


    public function sort(){
        $arr = array(50,2,1,9);
        $num = count($arr);
        for($i = $num;$i>=0;$i--){
            for($j=0;$j<$i-1;$j++){
                if($this->compareByFirst($arr[$j],$arr[$j+1])<0){
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j+1];
                    $arr[$j+1] = $temp;
                }
            }
        }
        pr($arr);
    }
    public function compareByFirst($n,$m){
        $n_first = strval($n)[0];
        $m_first = strval($m)[0];
        return $n_first - $m_first;

    }

    public function listEquation(){
        $max = base_convert('222222222',3,10);
        for($i = 0;$i<=$max;$i++){
            $numArr =  $this->patternNum(sprintf('%09s',base_convert($i,10,3)));
            if(array_sum($numArr) == 100)echo implode(' + ',$numArr).'<br />';
        }
    }

    public function patternNum($patternStr){
        $patternStr = str_split($patternStr);
        $numArr = array();
        foreach ($patternStr as $k=>$v){
            if($v == 0){
                if(empty($numArr))$numArr[] = $k+1;
                else $numArr[count($numArr)-1] = strval($numArr[count($numArr)-1]).strval($k+1);
            }elseif ($v == 1){
                $numArr[] = $k+1;
            }elseif ($v == 2){
                $numArr[] = -($k+1);
            }
        }
        return $numArr;
    }
}