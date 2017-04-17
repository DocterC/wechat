<?php

namespace App\Http\Helpers;

use Cache;

trait BaseWechat
{

   private $accessTokenUrl = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential';

   private $callBackIpUrl = 'https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=';

   private $appid = 'wx94d85c5c295ce5bb';

   private $secret ='5dfe8b83d913cb38e297b06d8c816bf8';


   public function getcallbackip()
   {
   		$access_token = $this->getAccessToken();
   		$url = $this->callBackIpUrl.$access_token;
   		return $result =  file_get_contents($url);

   }


    public function getAccessToken()
    {
         if(!Cache::has('access_token'))
         {
         	$url = $this->accessTokenUrl.'&appid='.$this->appid.'&secret='.$this->secret;
           	$result =  file_get_contents($url);
           	$result = json_decode($result);
           	Cache::put('access_token',$result->access_token,10);
           	return $result->access_token;
         }
         return Cache::get('access_token');
    }


}
