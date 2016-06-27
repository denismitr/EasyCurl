<?php

namespace Denismitr\EasyCurl;


class EasyCurl
{

    private $ch;
    private $url;
    private $response;


    public function __construct($url = null)
    {
        $this->postTo($url);
    }


    public static function post($url)
    {
        return new static($url);
    }


    public function postTo($url)
    {
        if (!empty($url))
        {
            $this->url = $url;
        }

        return $this;
    }


    public function send(array $payload)
    {
        $this->ch = curl_init();

        curl_setopt($this->ch, CURLOPT_URL, $this->url);
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);

        $this->response = curl_exec($this->ch);
        curl_close($this->ch);

        return $this;
    }


    public function getDecodedResponse()
    {
        return json_decode($this->response);
    }
}