<?php
/**
 * Created by PhpStorm.
 * User: zdb
 * Date: 2018/3/8
 * Time: 11:25
 */

namespace app\api\validate;




class IsPosiviteValidate extends BaseValidate
{
    protected $rule = [
      'weid'=>'require|isPosiviteInt',
    ];
}