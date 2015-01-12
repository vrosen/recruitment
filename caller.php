<?php
/*
 * this is a test Api App
 * made by Viktor Panayotov for Cayetanogaming
 * on 09.01.2015,Varna,Bulgaria
 */



class Caller{
    
    public $err_msg;
    
    public function __construct() 
    {
        $this->err_msg = 'Error!';
    }
    //resturns json string
    public function getByUrl($url)
    {
        //we are getting the content of the provided $url
        return file_get_contents($url);
    }
    //returns decoded json string
    public function getByUrlDecoded($url)
    {
        //we are decoding the content of the provided $url
        return json_decode(file_get_contents($url));
    }
    
    //returns json string
    public function getByCurl($url)
    {
        //we are getting the content of he url true Curl
        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $response = curl_exec($ch);
        curl_close($ch);
        
        if(!empty($response)){
            return $response;
        } else {
            return $this->err_msg;
        }

    }
    
    //returns json string
    public function searchCandidatePost($search)
    {
        //we are posting the search with Curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://localhost/RecruitmentApi/");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('search' => $search)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        
        if(!empty($server_output)){
            return $server_output;
        } else {
            return $this->err_msg;
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}