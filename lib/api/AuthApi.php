<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Cardpay\ApiException;
use Cardpay\Configuration;
use Cardpay\HeaderSelector;
use Cardpay\ObjectSerializer;

class AuthApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param string          $host
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        $host,
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration($host);
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation obtainTokens
     *
     * Get authorization token
     *
     * @param  string $grant_type Token request credentials representation (required)
     * @param  string $password Terminal password value (only for [password] grant type) (optional)
     * @param  string $refresh_token Refresh token string (only for [refresh_token] grant type) (optional)
     * @param  string $terminal_code Terminal code value (optional)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cardpay\model\ApiTokens
     */
    public function obtainTokens($grant_type, $password = null, $refresh_token = null, $terminal_code = null)
    {
        list($response) = $this->obtainTokensWithHttpInfo($grant_type, $password, $refresh_token, $terminal_code);
        return $response;
    }

    /**
     * Operation obtainTokensWithHttpInfo
     *
     * Get authorization token
     *
     * @param  string $grant_type Token request credentials representation (required)
     * @param  string $password Terminal password value (only for [password] grant type) (optional)
     * @param  string $refresh_token Refresh token string (only for [refresh_token] grant type) (optional)
     * @param  string $terminal_code Terminal code value (optional)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cardpay\model\ApiTokens, HTTP status code, HTTP response headers (array of strings)
     */
    public function obtainTokensWithHttpInfo($grant_type, $password = null, $refresh_token = null, $terminal_code = null)
    {
        $returnType = '\Cardpay\model\ApiTokens';
        $request = $this->obtainTokensRequest($grant_type, $password, $refresh_token, $terminal_code);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = (string) $responseBody;
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\ApiTokens',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\OAuthError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation obtainTokensAsync
     *
     * Get authorization token
     *
     * @param  string $grant_type Token request credentials representation (required)
     * @param  string $password Terminal password value (only for [password] grant type) (optional)
     * @param  string $refresh_token Refresh token string (only for [refresh_token] grant type) (optional)
     * @param  string $terminal_code Terminal code value (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function obtainTokensAsync($grant_type, $password = null, $refresh_token = null, $terminal_code = null)
    {
        return $this->obtainTokensAsyncWithHttpInfo($grant_type, $password, $refresh_token, $terminal_code)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation obtainTokensAsyncWithHttpInfo
     *
     * Get authorization token
     *
     * @param  string $grant_type Token request credentials representation (required)
     * @param  string $password Terminal password value (only for [password] grant type) (optional)
     * @param  string $refresh_token Refresh token string (only for [refresh_token] grant type) (optional)
     * @param  string $terminal_code Terminal code value (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function obtainTokensAsyncWithHttpInfo($grant_type, $password = null, $refresh_token = null, $terminal_code = null)
    {
        $returnType = '\Cardpay\model\ApiTokens';
        $request = $this->obtainTokensRequest($grant_type, $password, $refresh_token, $terminal_code);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'obtainTokens'
     *
     * @param  string $grant_type Token request credentials representation (required)
     * @param  string $password Terminal password value (only for [password] grant type) (optional)
     * @param  string $refresh_token Refresh token string (only for [refresh_token] grant type) (optional)
     * @param  string $terminal_code Terminal code value (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function obtainTokensRequest($grant_type, $password = null, $refresh_token = null, $terminal_code = null)
    {
        // verify the required parameter 'grant_type' is set
        if ($grant_type === null || (is_array($grant_type) && count($grant_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $grant_type when calling obtainTokens'
            );
        }

        $resourcePath = '/api/auth/token';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($grant_type !== null) {
            $formParams['grant_type'] = ObjectSerializer::toFormValue($grant_type);
        }
        // form params
        if ($password !== null) {
            $formParams['password'] = ObjectSerializer::toFormValue($password);
        }
        // form params
        if ($refresh_token !== null) {
            $formParams['refresh_token'] = ObjectSerializer::toFormValue($refresh_token);
        }
        // form params
        if ($terminal_code !== null) {
            $formParams['terminal_code'] = ObjectSerializer::toFormValue($terminal_code);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
