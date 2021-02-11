<?php

namespace DebitCardsAPI;

use GuzzleHttp\Client;

class APIClient
{
    protected Client $httpClient;
    protected string $authKey;

    public function __construct(string $baseUri, string $authKey)
    {
        $this->httpClient = new Client(['base_uri' => $baseUri]);
        $this->authKey = $authKey;
    }

    protected function get($url)
    {
        $response = $this->httpClient->request('GET', $url, [
            'headers' => $this->getHeaders()
        ]);

        return json_decode($response->getBody()->getContents());
    }

    protected function post($url, $data) {
        $response = $this->httpClient->request('POST', $url, [
            'json' => $data['json'],
            'headers' => $this->getHeaders()
        ]);

        return json_decode($response->getBody()->getContents());
    }

    private function getHeaders(): array {
        return [
            'Auth-Key' => $this->authKey
        ];
    }
}
