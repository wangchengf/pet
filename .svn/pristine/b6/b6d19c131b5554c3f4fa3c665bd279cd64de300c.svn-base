<?php
/**
 * Created by PhpStorm.
 * User: zdb
 * Date: 2018/2/5
 * Time: 10:30
 */

namespace app\api\controller\v1;

use app\api\ApiController;
use app\api\model\Members;
use app\api\validate\CodeValidate;

class Login extends ApiController
{
    public function wx(){
        //check  code;
        //使用封装好的验证类
        (new CodeValidate())->goCheck();
        $code = input('code');
        $app_id = config('wx.app_id');
        $app_secret = config('wx.app_secret');
        $login_url = config('wx.login_url');
        $url = sprintf($login_url,$app_id,$app_secret,$code);
        $result = curl_get($url);
        if(empty($result)){
            return ['errCode'=>1000,'msg'=>'调用微信接口失败'];
        }
        $re = json_decode($result,true);
        if(!isset($re['openid'])){
            return ['errCode'=>1001,'msg'=>$result];
        }
        $unionid = $re['unionid'];
        $user = Members::get(['unionid'=>$unionid]);
        if(empty($user)){
            return ['msg'=>'还没有开通名片','code'=>200];
        }
        $data = [
            #非必须。issued at。 token创建时间，unix时间戳格式
            "iat"       => $_SERVER['REQUEST_TIME'],
            #非必须。expire 指定token的生命周期。unix时间戳格式
            "exp"       => $_SERVER['REQUEST_TIME'] + config('wx.tokenExp'),
            'uid'=>$user['uid'],
        ];
        $token = $this->createJwt($data);
        if(!empty($token)){
            return ['token'=>$token,'code'=>200];
        }else{
            return ['errCode'=>1003,'msg'=>'生成token失败'];
        }

    }

    //
    private function createJwt($data=[],$alg='SHA256'){
        if(!is_array($data)){
            return false;
        }
        $secret = config('wx.auth_secret');
        if(empty($secret)){
            return false;
        }
        $header = base64_encode(json_encode(['typ' => 'JWT', 'alg' => $alg]));
        $p = base64_encode(json_encode($data));
        $input = $header.'.'.$p;
        $sign = hash_hmac($alg,$input,$secret);
        $token = $input.'.'.$sign;
        return $token;
    }

}