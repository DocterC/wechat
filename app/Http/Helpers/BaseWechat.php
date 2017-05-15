<?php

namespace App\Http\Helpers;

use Cache;
use GuzzleHttp\Client;

trait BaseWechat
{
  private $appid = 'wx94d85c5c295ce5bb';

   private $secret ='5dfe8b83d913cb38e297b06d8c816bf8';

   private $accessTokenUrl = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx94d85c5c295ce5bb&secret=5dfe8b83d913cb38e297b06d8c816bf8';

   private $callBackIpUrl = 'https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=';
   


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
           	$result = $this->getGuzzle($this->accessTokenUrl);
           	$result = json_decode($result);
           	Cache::put('access_token',$result->access_token,10);
           	return $result->access_token;
         }
         return Cache::get('access_token');
    }


    public function getIpAddress()
    {
      $url = "https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=".$this->getAccessToken();
      return $this->getGuzzle($url);
    }


    public function addMenu()
    {
      $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=ACCESS_TOKEN".$this->getAccessToken();

      $data =  [
     "button"=>[
     [  
          "type"=>"click",
          "name"=>"今日歌曲",
          "key"=>"V1001_TODAY_MUSIC"
      ],
      [
           "name"=>"菜单",
           "sub_button"=>[
           [  
               "type"=>"view",
               "name"=>"搜索",
               "url"=>"http://www.soso.com/"
            ],
            [
               "type"=>"view",
               "name"=>"视频",
               "url"=>"http://v.qq.com/"
            ],
            [
               "type"=>"click",
               "name"=>"赞一下我们",
               "key"=>"V1001_GOOD"
            ]]
       ]]
 ];
return     $this->postGuzzle($url,$data);


}



    public function postGuzzle($url,$data)
    {
      $client = new Client;

      $response = $client->request('POST',$url,$data);

      return $response->getBody();;
    }


    public function getGuzzle($url)
    {
      
      $client = new Client;

      $data = $client->get($url,['verify' => true]);

      return $data->getBody();

    }

}
