<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class MailController extends Controller
{
    
    public function send()
    {

        Mail::raw('你好，我是PHP程序！', function ($message) {
	    	$to = '282584778@qq.com';
	    	$message ->to($to)->subject('纯文本信息邮件测试');
		});
    }



}
