<?php
 
class Yo {

    protected $apiKey; 

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }
    
    public function user($username,$url_lat='',$lang='') {
        if ($username == '') return; 

        $data=array();
        $data['api_token'] = $this->apiKey;
        $data['username'] = $username;
        if ($url_lat && $lang)
           $data['location'] = "$url_lat,$lang";
        elseif ($url_lat)
           $data['link'] = $url_lat;
        
        return $this->sendRequest("http://api.justyo.co/yo/",$data);
       
    }
    
    public function msg($username,$text){
     return  $this->user($username,"http://www.yotext.co?text=".$text);
    }
    

    public function all($link='') {
        $data=array();
        $data['api_token'] = $this->apiKey;
        if ($link)
           $data['link'] = $link;
        
        return $this->sendRequest("http://api.justyo.co/yoall/",$data);
    }

    public function subscribers_count(){ 
        $url="http://api.justyo.co/subscribers_count?api_token=".$this->apiKey;
        $result= file_get_contents($url);
        if ($result){
            $json=json_decode($result);
            return $json->result; 
        } else
         return 0;
         
    }

    private function sendRequest($url,$data) {
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ),
        );
        
        $context  = stream_context_create($options);
        return file_get_contents($url, false, $context);
    }




}
?>
