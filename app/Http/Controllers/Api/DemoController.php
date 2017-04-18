<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\BaseWechat;
use Log;

class DemoController extends Controller
{
    use BaseWechat;

    public function first(Request $request)
    {
    	Log::info($request->all());
    	return  $request->input('echostr');
    }

    public function demo()
    {
    	return  $this->getcallbackip();
    }


}
