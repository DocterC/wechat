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
    	Log::info('start');
        
        return 'success';
    	return  $request->input('echostr');
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
