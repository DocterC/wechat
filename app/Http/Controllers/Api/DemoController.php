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
        $time =time();
        return  "<xml>
                <ToUserName>$openid</ToUserName>
                <FromUserName>292808514</FromUserName>
                <CreateTime>$time</CreateTime>
                <MsgType>text</MsgType>
                <Content>hello world</Content>
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
