<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\BaseWechat;
use Log;
use Storage;

class DemoController extends Controller
{
    use BaseWechat;

    public function first(Request $request)
    {
        
        $result = $request->all();
        $openid = $request['openid'];
        return  "<xml>
                <ToUserName><![CDATA[$openid]]></ToUserName>
                <FromUserName><![CDATA[292808514]]></FromUserName>
                <CreateTime><![CDATA[12017193719]]></CreateTime>
                <MsgType><![CDATA[text]]></MsgType>
                <Content><![CDATA[你好]]></Content>
                </xml>";
    }

    public function demo()
    {
    	return  $this->getcallbackip();
    }

    public function showLog()
    {
        $arr =  Storage::disk('log')->get('laravel.log');

        return $arr;
    }


}
