<?php
/**
 * Created by PhpStorm.
 * User: zdb
 * Date: 2018/3/8
 * Time: 11:25
 */

namespace app\api\validate;


use think\Request;
use think\Validate;
use app\lib\exception\ParameterException;

class BaseValidate extends Validate
{
    public function goCheck(){
        $request = Request::instance();
        $data = $request->param();
        if(!$this->check($data)){
            $ex = new ParameterException([
                'msg'=>is_array($this->error)? implode('|',$this->error) :$this->error
            ]);
            throw $ex;
        }else{
            return true;
        }
    }

    public function isPosiviteInt($value, $rule='', $data='', $field=''){
        if(is_numeric($value) && ($value+1) > 1 && is_int($value+0)){
            return true;
        }
        return $field.'不是正整数';
    }
}