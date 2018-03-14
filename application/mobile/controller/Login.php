<?php
/**
 * zhouma
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * 采用TP5助手函数可实现单字母函数M D U等,也可db::name方式,可双向兼容
 * ============================================================================
 * $Author: 周庚 2017-12-23 $
 */
namespace app\mobile\controller;
use think\Controller;

class Login extends Controller
{
    public function index(){
        //
        $weid = Request::instance()->get('weid');
        $userInfo =
            Db::table('ims_bncard')
                ->alias('b')
                ->join('ims_members m','m.uid = b.uid')
                ->where(array('b.weid'=>$weid))
                ->select();
        //var_dump($userInfo);
        //动态

        //文章

        //导航栏

        //dev开发分支
        //1.0版本合并1.1

        //return $this->fetch();


    }
}
