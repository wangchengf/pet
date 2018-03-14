<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2018/2/6
 * Time: 10:38
 */
namespace app\weishilive\controller;
use app\weishilive\weishiserver\ToWeishiServer;
use think\Controller;


class Getlivelist extends Controller
{
    public function livelist(){
        //
        $postdataarr = array();
        $postdataarr['pagenumber'] = 1;
        $postdataarr['pagesize']=20;
        $postdataarr['orderby']='hot';

//    $postdataarr['orderby']=isset($_GPC['orderby'])?$_GPC['orderby']:'time';
        $postdataarr['order']='desc';
        $postdataarr['search']='';

        $getlistins = new ToWeishiServer();
        $getlist = $getlistins->getlivelist($postdataarr);
        echo $getlist ;

    }
}