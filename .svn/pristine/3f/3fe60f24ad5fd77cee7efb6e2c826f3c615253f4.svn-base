<?php
namespace app\mobile\controller;
use think\Controller;
use \think\Request;
use \think\Db;

class Index extends Controller {

    public function index(){
        //
        $weid = Request::instance()->get('weid');
        $userInfo =
            Db::table('ims_bncard')
            ->alias('b')
            ->join('ims_members m','m.uid = b.uid')
            ->where(array('b.weid'=>$weid))->field('unionid,weid')
            ->find();
        var_dump($userInfo);
        $code = Request::instance()->get('code');
        $url = 'https://wx.api.com';
        $unionid = get_curl($url,$code);

        if($userInfo['unionid'] == $unionid){
            return json(['123456789']);//token;
        }else{
            //insert();登录；
        }

        //动态

        //文章

        //导航栏

        //
        //return $this->fetch();


    }




       
}