<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class OmdbService
{
    public function __construct(
        protected HttpClientInterface $client,
        protected string $apiUrl,
        protected string $apiKey
    ) { }

    public function search(string $search)
    {
        $results = [];
        $response = $this->client->request(
            'GET',
            $this->getApiUrl() . "&s=$search"
        );

        $content = $response->toArray();

        if (isset($content['Response']) === true &&
            $content['Response'] === 'True'
        ) {
            $results = $content['Search'];
        }
        return $results;
    }

    public function getById(string $id)
    {
        $result = null;
        $response = $this->client->request(
            'GET',
            $this->getApiUrl() . "&i=$id"
        );

        $content = $response->toArray();

        if (isset($content['Response']) === true &&
            $content['Response'] === 'True'
        ) {
            $result = $content;
        }
        return $result;
    }

    protected function getApiUrl()
    {
        return "{$this->apiUrl}?apikey={$this->apiKey}";
    }
}
