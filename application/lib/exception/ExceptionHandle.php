<?php
/**
 * Created by PhpStorm.
 * User: zdb
 * Date: 2018/3/6
 * Time: 11:20
 */

namespace app\lib\exception;


use Exception;
use think\exception\Handle;
use think\Request;
use think\Log;

class ExceptionHandle extends Handle
{
    public $errCode;
    public $msg;

    public function render(Exception $e){
        if($e instanceof BaseException){
            $this->errCode = $e->errCode;
            $this->msg = $e->msg;
        }else{
            if(config('app_debug')){
                return parent::render($e);
            }
            //写入日志
            $this->errCode = 500;
            $this->msg = '内部错误';
            $this->recordLog($e);


        }
        $request = Request::instance();
        $data = [
            'errCode'=>$this->errCode,
            'msg'=>$this->msg,
            'url'=>$request->url()
        ];
        return json($data);

    }

    //
    public function recordLog($msg){
        Log::init([
            'type'=>'file',
            'path'=>LOG_PATH,
            'level'=>['error']
        ]);
        Log::record($msg->getMessage(),'error');
    }
}