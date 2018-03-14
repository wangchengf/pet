<?php
/**
 * Created by PhpStorm.
 * User: zdb
 * Date: 2018/2/5
 * Time: 10:25
 */
return [
    'default_return_type'    => 'json',//默认输出类型  json

    'view_replace_str'  =>  [
        '__PUBLIC__'=>'/public',
        '__STATIC__' => '/tpl/mobile/new1/static',
        '__ROOT__'=>''
    ],
    // 异常处理handle类 留空使用 \think\exception\Handle
    'exception_handle'       => '\\app\\lib\\exception\\ExceptionHandle',
    'app_debug'=>true,
    'log'   => [
        // 可以临时关闭日志写入
        'type'  => 'test',
    ],
];