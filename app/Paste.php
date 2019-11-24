<?php

namespace app;

use modules\colorful\Colors;

class Paste {
    private $apiURL = "https://pastefy.ga/create:paste";
    private $postParams = [
        "title"=>"Hi",
        "content"=>"Hallo"
    ];

    public function send(){
        Colors::info("Sending...");
        $headers = [];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->postParams);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $this->apiURL);
        curl_setopt($ch, CURLOPT_HEADERFUNCTION,
        function($curl, $header) use (&$headers) {
            $len = strlen($header);
            $header = explode(':', $header, 2);
            if (count($header) < 2)
                return $len;
            $headers[strtolower(trim($header[0]))][] = trim($header[1]);
            return $len;
        });

        $response = curl_exec($ch);

        if (isset($headers["location"][0]))
            return "https://pastefy.ga".$headers["location"][0];
        
        Colors::error("A error occured");
        exit();
    }


    public function setContents($contents){
        $this->postParams["content"] = $contents;
    }

    public function setTitle($title){
        $this->postParams["title"] = $title;
    }

    public function setPassword($password){
        $this->postParams["password"] = $password;
    }
    


}