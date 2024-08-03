<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
    public function makeRequest($method, $requestUrl, $queryParams = [],
        $formParams = [], $headers = [], $isJsonRequest = false)
    {
        $client = new Client([
            'verify',
            'base_uri' => $this->baseUri,
        ]);

        if (method_exists($this, 'resolveAuthorization')) {
            $this->resolveAuthorization($queryParams, $formParams, $headers);
        }

        $options = [
            'headers' => $headers,
            'query' => $queryParams,
        ];

        if ($isJsonRequest) {
            $options['json'] = $formParams;
        } else {
            $options['form_params'] = $formParams;
        }

        $response = $client->request($method, $requestUrl, $options);

        $responseBody = $response->getBody()->getContents();

        if (method_exists($this, 'decodeResponse')) {
            $responseBody = $this->decodeResponse($responseBody);
        }

        return $responseBody;
    }
}
