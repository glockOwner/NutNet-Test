<?php
namespace App\Components;
use GuzzleHttp\Client;
class HttpClient
{
    public $client;
    public function __construct($url)
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $url,
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
    }
}
