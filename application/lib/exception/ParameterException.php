<?php
/**
 * Created by PhpStorm.
 * User: zdb
 * Date: 2018/3/8
 * Time: 11:38
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $errCode = 10000;
    public $msg = "invalid parameters";

}