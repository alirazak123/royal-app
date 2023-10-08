<?php

namespace App\Clients;

use GuzzleHttp\Client;

class CandidateTestingClient
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function login()
    {
        $loginEndpoint = 'https://candidate-testing.api.royal-apps.io/api/v2/token';

        $response = $this->client->post($loginEndpoint, [
            'json' => [
                'email' => 'ahsoka.tano@royal-apps.io',
                'password' => 'Kryze4President',
            ],
        ]);
       
        if($response->getStatusCode() == 200){
            $responseData = json_decode($response->getBody()->getContents());
            session()->put('session_access_token', $responseData->token_key);
            session()->put('login_user_info', $responseData);
            return $responseData;
        }else{
            return false;
        }

        
    }

    public function makeRequest($method, $endpoint, $data = [])
    {
        $accessToken = session()->get('session_access_token');
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken,
        ];

        $response = $this->client->request($method, $endpoint, [
            'headers' => $headers,
            'json' => $data,
        ]);
        $responseData = json_decode($response->getBody()->getContents());
        return $responseData;
    }
}