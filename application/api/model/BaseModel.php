<?php
/**
 * Created by PhpStorm.
 * User: zdb
 * Date: 2018/3/12
 * Time: 11:47
 */

namespace app\api\model;


use think\Model;

class BaseModel extends Model
{
    protected function prefixUrlImage($value,$data){
        if($data['from'] == 1){
            $url = config('img_prefix').$value;
        }else{
            $url = $value;
        }
        return $value;
    }
}