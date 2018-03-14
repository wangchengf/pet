<?php
/**
 * Created by PhpStorm.
 * User: zdb
 * Date: 2018/3/8
 * Time: 10:46
 */

namespace app\api\model;


class Members extends BaseModel
{
    protected $hidden = ['password','salt','nick_name','avatar_thumb'];
    public function items(){
        return $this->belongsTo('Bncard','uid','uid');
    }

    public static function getUserByUid($id){
        return self::with('items')->find($id);
    }

    protected function getUrlAttr($value,$data){
        return self::prefixUrlImage($value,$data);
    }



}