<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\BaseWechat;

class DemoController extends Controller
{
    use BaseWechat;

    public function first(Request $request)
    {
    	return  $request->input('echostr');
    }

    public function demo()
    {
    	return  $this->getcallbackip();
    }


}
