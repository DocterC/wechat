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

        $file_in = file_get_contents("php://input"); //接收post数据

        $xml = simplexml_load_string($file_in);//转换post数据为simplexml对象

        $array = array();
        
        foreach($xml as $key => $item)    //遍历所有节点数据
        {
            $array[$key] = $item;
            //$str = $child->getName() . ": " . $child . "<br />"; //打印节点名称和节点值
        }

        Log::info($array);
        return 'success';
  }
//if($child->getName()=="from")    //捡取要操作的节点
//{
//echo "i say ". ": get you!" . "<br />"; //操作节点数据
//}
/*
header('Content-Type: text/xml');
        $xml = <<<XML
                <?xml version="1.0" encoding="utf-8"?>
                <xml>
                    <ToUserName><![CDATA[toUser]]></ToUserName>
                    <FromUserName><![CDATA[fromUser]]></FromUserName>
                    <CreateTime>12345678</CreateTime>
                    <MsgType><![CDATA[image]]></MsgType>
                    <Image>
                        <MediaId><![CDATA[media_id]]></MediaId>
                    </Image>
                </xml>

XML;




        return $xml;
*/

    public function demo()
    {
        Log::info('start');
        return 'success';
    	//return  $this->getcallbackip();
    }

    public function showLog()
    {
        $arr =  Storage::disk('log')->get('laravel.log');

        return $arr;
    }




}
