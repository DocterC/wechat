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
        /*
        return  "<xml>
                <ToUserName>$openid</ToUserName>
                <FromUserName>292808514</FromUserName>
                <CreateTime>$time</CreateTime>
                <MsgType>text</MsgType>
                <Content>hello world</Content>
                </xml>";
            */

        $file_in = file_get_contents("php://input"); //接收post数据

        $xml = simplexml_load_string($file_in);//转换post数据为simplexml对象

        foreach($xml->children() as $child)    //遍历所有节点数据
        {

            $str = $child->getName() . ": " . $child . "<br />"; //打印节点名称和节点值
            Log::info($str);

//if($child->getName()=="from")    //捡取要操作的节点
//{
//echo "i say ". ": get you!" . "<br />"; //操作节点数据
//}

        }

        return 'success';

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
