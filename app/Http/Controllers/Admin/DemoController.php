<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DemoController extends Controller
{
	
	public $request;
    public function __construct(Request $request)
    {
        $this->request=$request;
    }

    public function demo(){
        $size = Storage::disk('image')->size('2000.jpg');
        $header=[
            'Content-Length'=>$size
        ];

        return  response()->file('2000.jpg',$header);
    }

	
	public function test(Request $request){
		
		$echostr=$request->echostr;
		return $echostr;
		
		
	
	}


	public function sendMseeage()
	{
		return $this->request->all();
	}


}
