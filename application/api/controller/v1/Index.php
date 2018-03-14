<?php

/**
 * Created by PhpStorm.
 * User: zdb
 * Date: 2018/2/5
 * Time: 10:27
 */
namespace app\api\controller\v1;

use app\api\model\Members;
use app\lib\exception\ParameterException;
use think\Controller;

class Index extends Controller
{
    public function index(){
        return Members::getUserByUid(1);
    }

    public function add(){
        $m = new Members();
        return $m->save(['username'=>'xx']);
    }

    public function update(){
        $m = new Members();
        return $m->save(['username'=>'ac'],['username'=>'xx']);
    }

    public function del(){
        $m = Members::get(['username'=>'ac']);
        if(!$m){
            return new ParameterException(['msg'=>'不存在此用户']);
        }
        return $m->delete();
    }
}