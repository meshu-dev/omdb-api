<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

abstract class BaseApiService
{
    protected abstract function getApiUrl();

    public function get(string|null $params): Response
    {
        $requestUrl = $this->getApiUrl();

        if ($params) {
            $requestUrl .= $params;
        }

        return Http::get($requestUrl);
    }
}
