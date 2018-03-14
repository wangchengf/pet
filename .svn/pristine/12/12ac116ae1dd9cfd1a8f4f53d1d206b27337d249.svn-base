<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2018/2/6
 * Time: 10:59
 */
namespace app\weishilive\weishiserver;
class ToWeishiServer{

    private $accesskeyid='zhuoma360beta';                //访问服务所用的密钥ID
    private $accesskeysecret='2|ykYG1[*)Yy_|f*fSeMH+K*EfhojD' ;             //密钥
    private $timestamp;					//请求的时间戳
    private $signatureNonce;             	//唯一随机数
    private $signature;				//签名生成方式md5(AccessKeyId + AccessKeySecret + Timestamp + SignatureNonce)。


    /**
     * 参数初始化
     * @param $RequestType [选择php请求方式，fsockopen或curl,若为curl方式，请检查php配置是否开启]
     */
    public function __construct($RequestType='curl'){

//        $this->RequestType = $RequestType;
    }


    // 获取直播列表
    public function getlivelist($postdataarr)
    {

        if($postdataarr['search']){
            $temkey ='search';
        }
//        elseif($postdataarr['livename']){
//            $temkey ='livename';
//        }elseif($postdataarr['compereid']){
//            $temkey ='compereid';
//        }
        else{
            $temkey ='compereid';
            $postdataarr['compereid']=0;
        }
        $signatureNonce=mt_rand(11111111,999999999);
        $timestamp =(int)time();
        $signature = md5($this->accesskeyid.$this->accesskeysecret.$timestamp.$signatureNonce);
        $url = 'https://zhubo.zhuoma360.com/api-compere/getCompereLiveList';

        $data = array(
            'accesskeyid'=>$this->accesskeyid,
            'timestamp'=>$timestamp,
            'signaturenonce'=>$signatureNonce,
            'signature'=>$signature,
//            'compereid'=>$postdataarr['compereid'],                  //用户搜索主播名称时
            'pagenumber'=>$postdataarr['pagenumber'],
            'pagesize'=>$postdataarr['pagesize'],
            'orderby'=>$postdataarr['orderby'],
            'order'=>$postdataarr['order'],
            $temkey=>$postdataarr[$temkey],
//            'nickname'=>'卢娟',
//            'livename'=>$postdataarr['livename']



        );
        $result = request_post($url,$data);

        return $result;

    }
    // 获取主播信息
    public function getzhubo($postdataarr)
    {


        $signatureNonce=mt_rand(11111111,999999999);
        $timestamp =(int)time();
        $signature = md5($this->accesskeyid.$this->accesskeysecret.$timestamp.$signatureNonce);
        $url = 'https://zhubo.zhuoma360.com/api-token/gettoken';

        $data = array(
            'timestamp'=>$timestamp,
            'signaturenonce'=>$signatureNonce,
            'signature'=>$signature,
            'uid'       =>$postdataarr['uid'],
            'nickname' =>$postdataarr['nickname'],
            'headimgurl'=>$postdataarr['headimgurl'],
            'sex'        =>$postdataarr['sex'],
            'comperename'=>$postdataarr['comperename'],
            'city'        =>$postdataarr['city'],
            'mpurl'       =>$postdataarr['mpurl'],


        );
        $result = request_post($url,$data);

        return $result;

    }

    //刷新token
    public function refreshtoken($postdataarr){

        $url = 'https://zhubo.zhuoma360.com/api-token/refreshtoken?exptoken='.$postdataarr;

        $result = request_post($url);

        return $result;

    }

    //获取主播信息
    public function getliveinfo($postdataarr){

        $url = 'https://zhubo.zhuoma360.com/api-wechatxcx/getliveinfo?token='.$postdataarr['token'];

        $result = request_post($url);

        return $result;

    }
    //更新直播状态
    public function updatelivestate($postdataarr){

        $url = 'https://zhubo.zhuoma360.com/api-wechatxcx/updatelivestate?&state='.$postdataarr['state'].'&token='.$postdataarr['token'];

        $result = request_post($url);

        return $result;

    }
   //上传直播封面图片
    public function uploadcover($postdataarr){
//        var_dump($_FILES['file']);exit;
        $url = 'https://zhubo.zhuoma360.com/api-wechatxcx/uploadcover?token='.$postdataarr['token'];
        $data = array(

            'file'        =>'data:image/jpeg;base64,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'
        );

        $result = request_post($url,$data);

//        $result = request_file($url,$data);
        return $result;

    }
    //更新直播间信息
    public function updateliveinfo($postdataarr){

        $url = 'https://zhubo.zhuoma360.com/api-wechatxcx/updateliveinfo?token='.$postdataarr['token'].'&livename='.$postdataarr['livename'].'&livetime='.$postdataarr['livetime'].'&cover='.$postdataarr['cover'];

        $result = request_post($url);

        return $result;

    }
}