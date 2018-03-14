<?php
/**
 * Created by PhpStorm.
 * User: zdb
 * Date: 2018/2/5
 * Time: 10:32
 */

namespace app\api\controller;


use think\Controller;
use think\Request;

class BaseController extends Controller
{
    public $uid;

    public function _initialize(){
        $request = Request::instance();
        if(!$request->has('token')){
           echo 1; exit;
        }
        $token = input('token');
        $tokens = explode('.',$token);
        if(count($tokens) !== 3){
           echo 2; exit;
        }
        list($h,$p,$sign) = $tokens;
        $secret = config('wx.auth_secret');
        $header = json_decode(base64_decode($h),true);
        if (empty($header['alg'])){
            echo 3;exit;
        }
        $alg = $header['alg'];
        $input = $h.'.'.$p;
        if(hash_hmac($alg,$input,$secret) !== $sign){
            echo 4;exit;
        }
        $payload = json_decode(base64_decode($p),true);
        $time = $_SERVER['REQUEST_TIME'];
        if (isset($payload['iat']) && $payload['iat'] > $time){
            echo 5;exit;
        }
        if (isset($payload['exp']) && $payload['exp'] < $time){
            echo 6;exit;
        }
        $this->uid = $payload['uid'];
    }
}