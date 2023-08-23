<?php

namespace App\Services;

class ValorantAPI
{
    private $apiUrl;
    private $endpoint;
    private $callback;

    public function __construct()
    {
        $this->apiUrl = "https://valorant-api.com/v1";
    }

    public function agents()
    {
        $this->endpoint = "/agents?language=pt-BR";
    }

    public function maps()
    {
        $this->endpoint = "/maps?language=pt-BR";
    }

    public function callback()
    {
        return $this->callback;
    }

    public function get()
    {
        $url = $this->apiUrl . $this->endpoint;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $this->callback = json_decode($response);
    }
}
