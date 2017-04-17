<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DemoController extends Controller
{
    

    public function first(Request $request)
    {
    	return  $request->input('echostr');
    }
}
