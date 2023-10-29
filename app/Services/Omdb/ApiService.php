<?php

namespace App\Services\Omdb;

use App\Services\BaseApiService;

class ApiService extends BaseApiService
{
    public function __construct(
        protected string $apiUrl,
        protected string $apiKey
    ) { }

    public function search(string $search)
    {
        $results = [];
        $response = $this->get("&s=$search");

        if ($response->successful()) {
            $results = $response->json()['Search'];
        }
        return $results;
    }

    public function getById(string $id)
    {
        $response = $this->get("&i=$id");

        if ($response->successful()) {
            $result = $response->json();
        }

        return $result;
    }

    protected function getApiUrl()
    {
        return "{$this->apiUrl}?apikey={$this->apiKey}";
    }
}
