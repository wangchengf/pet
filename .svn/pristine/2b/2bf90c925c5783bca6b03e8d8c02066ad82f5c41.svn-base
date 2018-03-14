<?php
/**
 * Created by PhpStorm.
 * User: zdb
 * Date: 2018/3/8
 * Time: 11:14
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\model\Bncard;
use app\api\model\Members;
use app\api\model\Wechats;
use app\api\validate\IsPosiviteValidate;
use app\lib\exception\ParameterException;

class User extends BaseController
{
    public function getUserInfo(){
        $uid =$this->uid;
        $userInfo = Members::get($uid)->toArray();
        return $userInfo;
    }

    public function getBncardInfo(){
        (new IsPosiviteValidate())->goCheck();
        $weid = input('weid');
        Bncard::get(['weid'=>$weid]);
        $wechats = Wechats::get(['weid'=>$weid,'team_id'=>0]);
        if(empty($wechats)){
            throw new ParameterException(['msg'=>'不存在此名片，请检查weid']);
        }
        $uid = $wechats['uid'];
        if($uid  != $this->uid){

        }
        return $wechats;
    }
}