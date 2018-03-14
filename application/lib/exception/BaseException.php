<?php
/**
 * Created by PhpStorm.
 * User: zdb
 * Date: 2018/3/6
 * Time: 11:15
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    public $msg = 'invalid parameters';
    public $errCode = 999;

    public function __construct($params)
    {
        if(!is_array($params)){
            return false;
        }
        if(array_key_exists('errCode',$params)){
            $this->errCode = $params['errCode'];
        }
        if(array_key_exists('msg',$params)){
            $this->msg = $params['msg'];
        }
    }

}