<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
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

class PayoutsApi
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
     * Operation createPayout
     *
     * Create payout
     *
     * @param  \Cardpay\model\PayoutRequest $payout_request payoutRequest (required)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cardpay\model\PayoutResponse
     */
    public function createPayout($payout_request)
    {
        list($response) = $this->createPayoutWithHttpInfo($payout_request);
        return $response;
    }

    /**
     * Operation createPayoutWithHttpInfo
     *
     * Create payout
     *
     * @param  \Cardpay\model\PayoutRequest $payout_request payoutRequest (required)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cardpay\model\PayoutResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createPayoutWithHttpInfo($payout_request)
    {
        $returnType = '\Cardpay\model\PayoutResponse';
        $request = $this->createPayoutRequest($payout_request);

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
                        '\Cardpay\model\PayoutResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\BadRequestError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\AuthenticationError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\OAuthError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\NotFoundError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\ApiError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createPayoutAsync
     *
     * Create payout
     *
     * @param  \Cardpay\model\PayoutRequest $payout_request payoutRequest (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createPayoutAsync($payout_request)
    {
        return $this->createPayoutAsyncWithHttpInfo($payout_request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createPayoutAsyncWithHttpInfo
     *
     * Create payout
     *
     * @param  \Cardpay\model\PayoutRequest $payout_request payoutRequest (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createPayoutAsyncWithHttpInfo($payout_request)
    {
        $returnType = '\Cardpay\model\PayoutResponse';
        $request = $this->createPayoutRequest($payout_request);

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
     * Create request for operation 'createPayout'
     *
     * @param  \Cardpay\model\PayoutRequest $payout_request payoutRequest (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createPayoutRequest($payout_request)
    {
        // verify the required parameter 'payout_request' is set
        if ($payout_request === null || (is_array($payout_request) && count($payout_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payout_request when calling createPayout'
            );
        }

        $resourcePath = '/api/payouts';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($payout_request)) {
            $_tempBody = $payout_request;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
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
     * Operation getPayout
     *
     * Read payout information
     *
     * @param  string $payout_id Payout ID (required)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cardpay\model\PayoutResponse
     */
    public function getPayout($payout_id)
    {
        list($response) = $this->getPayoutWithHttpInfo($payout_id);
        return $response;
    }

    /**
     * Operation getPayoutWithHttpInfo
     *
     * Read payout information
     *
     * @param  string $payout_id Payout ID (required)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cardpay\model\PayoutResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPayoutWithHttpInfo($payout_id)
    {
        $returnType = '\Cardpay\model\PayoutResponse';
        $request = $this->getPayoutRequest($payout_id);

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
                        '\Cardpay\model\PayoutResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\BadRequestError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\AuthenticationError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\OAuthError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\NotFoundError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\ApiError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPayoutAsync
     *
     * Read payout information
     *
     * @param  string $payout_id Payout ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPayoutAsync($payout_id)
    {
        return $this->getPayoutAsyncWithHttpInfo($payout_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPayoutAsyncWithHttpInfo
     *
     * Read payout information
     *
     * @param  string $payout_id Payout ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPayoutAsyncWithHttpInfo($payout_id)
    {
        $returnType = '\Cardpay\model\PayoutResponse';
        $request = $this->getPayoutRequest($payout_id);

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
     * Create request for operation 'getPayout'
     *
     * @param  string $payout_id Payout ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPayoutRequest($payout_id)
    {
        // verify the required parameter 'payout_id' is set
        if ($payout_id === null || (is_array($payout_id) && count($payout_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payout_id when calling getPayout'
            );
        }

        $resourcePath = '/api/payouts/{payoutId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($payout_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payoutId' . '}',
                ObjectSerializer::toPathValue($payout_id),
                $resourcePath
            );
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
                []
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
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPayouts
     *
     * Get payouts information
     *
     * @param  string $request_id Request ID (required)
     * @param  string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code of transactions currency (optional)
     * @param  \DateTime $end_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period ends (not inclusive), UTC time, must be less than 7 days after &#39;start_time&#39;, default is current time (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     * @param  int $max_count Limit number of returned transactions (must be less than 10000, default is 1000, minimal value is 1) (optional)
     * @param  string $merchant_order_id Merchant order number from the merchant system (optional)
     * @param  string $payment_method Used payment method type name from payment methods list (optional)
     * @param  string $sort_order Sort based on order of results. &#x60;asc&#x60; for ascending order or &#x60;desc&#x60; for descending order (default value) (optional)
     * @param  \DateTime $start_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period starts (inclusive), UTC time, default is 24 hours before &#39;end_time&#39; (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cardpay\model\PayoutsList
     */
    public function getPayouts($request_id, $currency = null, $end_time = null, $max_count = null, $merchant_order_id = null, $payment_method = null, $sort_order = null, $start_time = null)
    {
        list($response) = $this->getPayoutsWithHttpInfo($request_id, $currency, $end_time, $max_count, $merchant_order_id, $payment_method, $sort_order, $start_time);
        return $response;
    }

    /**
     * Operation getPayoutsWithHttpInfo
     *
     * Get payouts information
     *
     * @param  string $request_id Request ID (required)
     * @param  string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code of transactions currency (optional)
     * @param  \DateTime $end_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period ends (not inclusive), UTC time, must be less than 7 days after &#39;start_time&#39;, default is current time (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     * @param  int $max_count Limit number of returned transactions (must be less than 10000, default is 1000, minimal value is 1) (optional)
     * @param  string $merchant_order_id Merchant order number from the merchant system (optional)
     * @param  string $payment_method Used payment method type name from payment methods list (optional)
     * @param  string $sort_order Sort based on order of results. &#x60;asc&#x60; for ascending order or &#x60;desc&#x60; for descending order (default value) (optional)
     * @param  \DateTime $start_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period starts (inclusive), UTC time, default is 24 hours before &#39;end_time&#39; (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cardpay\model\PayoutsList, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPayoutsWithHttpInfo($request_id, $currency = null, $end_time = null, $max_count = null, $merchant_order_id = null, $payment_method = null, $sort_order = null, $start_time = null)
    {
        $returnType = '\Cardpay\model\PayoutsList';
        $request = $this->getPayoutsRequest($request_id, $currency, $end_time, $max_count, $merchant_order_id, $payment_method, $sort_order, $start_time);

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
                        '\Cardpay\model\PayoutsList',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\BadRequestError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\AuthenticationError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\OAuthError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\ApiError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPayoutsAsync
     *
     * Get payouts information
     *
     * @param  string $request_id Request ID (required)
     * @param  string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code of transactions currency (optional)
     * @param  \DateTime $end_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period ends (not inclusive), UTC time, must be less than 7 days after &#39;start_time&#39;, default is current time (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     * @param  int $max_count Limit number of returned transactions (must be less than 10000, default is 1000, minimal value is 1) (optional)
     * @param  string $merchant_order_id Merchant order number from the merchant system (optional)
     * @param  string $payment_method Used payment method type name from payment methods list (optional)
     * @param  string $sort_order Sort based on order of results. &#x60;asc&#x60; for ascending order or &#x60;desc&#x60; for descending order (default value) (optional)
     * @param  \DateTime $start_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period starts (inclusive), UTC time, default is 24 hours before &#39;end_time&#39; (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPayoutsAsync($request_id, $currency = null, $end_time = null, $max_count = null, $merchant_order_id = null, $payment_method = null, $sort_order = null, $start_time = null)
    {
        return $this->getPayoutsAsyncWithHttpInfo($request_id, $currency, $end_time, $max_count, $merchant_order_id, $payment_method, $sort_order, $start_time)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPayoutsAsyncWithHttpInfo
     *
     * Get payouts information
     *
     * @param  string $request_id Request ID (required)
     * @param  string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code of transactions currency (optional)
     * @param  \DateTime $end_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period ends (not inclusive), UTC time, must be less than 7 days after &#39;start_time&#39;, default is current time (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     * @param  int $max_count Limit number of returned transactions (must be less than 10000, default is 1000, minimal value is 1) (optional)
     * @param  string $merchant_order_id Merchant order number from the merchant system (optional)
     * @param  string $payment_method Used payment method type name from payment methods list (optional)
     * @param  string $sort_order Sort based on order of results. &#x60;asc&#x60; for ascending order or &#x60;desc&#x60; for descending order (default value) (optional)
     * @param  \DateTime $start_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period starts (inclusive), UTC time, default is 24 hours before &#39;end_time&#39; (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPayoutsAsyncWithHttpInfo($request_id, $currency = null, $end_time = null, $max_count = null, $merchant_order_id = null, $payment_method = null, $sort_order = null, $start_time = null)
    {
        $returnType = '\Cardpay\model\PayoutsList';
        $request = $this->getPayoutsRequest($request_id, $currency, $end_time, $max_count, $merchant_order_id, $payment_method, $sort_order, $start_time);

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
     * Create request for operation 'getPayouts'
     *
     * @param  string $request_id Request ID (required)
     * @param  string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code of transactions currency (optional)
     * @param  \DateTime $end_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period ends (not inclusive), UTC time, must be less than 7 days after &#39;start_time&#39;, default is current time (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     * @param  int $max_count Limit number of returned transactions (must be less than 10000, default is 1000, minimal value is 1) (optional)
     * @param  string $merchant_order_id Merchant order number from the merchant system (optional)
     * @param  string $payment_method Used payment method type name from payment methods list (optional)
     * @param  string $sort_order Sort based on order of results. &#x60;asc&#x60; for ascending order or &#x60;desc&#x60; for descending order (default value) (optional)
     * @param  \DateTime $start_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period starts (inclusive), UTC time, default is 24 hours before &#39;end_time&#39; (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPayoutsRequest($request_id, $currency = null, $end_time = null, $max_count = null, $merchant_order_id = null, $payment_method = null, $sort_order = null, $start_time = null)
    {
        // verify the required parameter 'request_id' is set
        if ($request_id === null || (is_array($request_id) && count($request_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $request_id when calling getPayouts'
            );
        }
        if (strlen($request_id) > 50) {
            throw new \InvalidArgumentException('invalid length for "$request_id" when calling PayoutsApi.getPayouts, must be smaller than or equal to 50.');
        }
        if (strlen($request_id) < 1) {
            throw new \InvalidArgumentException('invalid length for "$request_id" when calling PayoutsApi.getPayouts, must be bigger than or equal to 1.');
        }

        if ($max_count !== null && $max_count > 10000) {
            throw new \InvalidArgumentException('invalid value for "$max_count" when calling PayoutsApi.getPayouts, must be smaller than or equal to 10000.');
        }
        if ($max_count !== null && $max_count < 1) {
            throw new \InvalidArgumentException('invalid value for "$max_count" when calling PayoutsApi.getPayouts, must be bigger than or equal to 1.');
        }

        if ($merchant_order_id !== null && strlen($merchant_order_id) > 50) {
            throw new \InvalidArgumentException('invalid length for "$merchant_order_id" when calling PayoutsApi.getPayouts, must be smaller than or equal to 50.');
        }
        if ($merchant_order_id !== null && strlen($merchant_order_id) < 0) {
            throw new \InvalidArgumentException('invalid length for "$merchant_order_id" when calling PayoutsApi.getPayouts, must be bigger than or equal to 0.');
        }

        if ($payment_method !== null && strlen($payment_method) > 50) {
            throw new \InvalidArgumentException('invalid length for "$payment_method" when calling PayoutsApi.getPayouts, must be smaller than or equal to 50.');
        }
        if ($payment_method !== null && strlen($payment_method) < 0) {
            throw new \InvalidArgumentException('invalid length for "$payment_method" when calling PayoutsApi.getPayouts, must be bigger than or equal to 0.');
        }

        if ($sort_order !== null && !preg_match("/asc|desc/", $sort_order)) {
            throw new \InvalidArgumentException("invalid value for \"sort_order\" when calling PayoutsApi.getPayouts, must conform to the pattern /asc|desc/.");
        }


        $resourcePath = '/api/payouts';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($currency !== null) {
            $queryParams['currency'] = ObjectSerializer::toQueryValue($currency);
        }
        // query params
        if ($end_time !== null) {
            $queryParams['end_time'] = ObjectSerializer::toQueryValue($end_time);
        }
        // query params
        if ($max_count !== null) {
            $queryParams['max_count'] = ObjectSerializer::toQueryValue($max_count);
        }
        // query params
        if ($merchant_order_id !== null) {
            $queryParams['merchant_order_id'] = ObjectSerializer::toQueryValue($merchant_order_id);
        }
        // query params
        if ($payment_method !== null) {
            $queryParams['payment_method'] = ObjectSerializer::toQueryValue($payment_method);
        }
        // query params
        if ($request_id !== null) {
            $queryParams['request_id'] = ObjectSerializer::toQueryValue($request_id);
        }
        // query params
        if ($sort_order !== null) {
            $queryParams['sort_order'] = ObjectSerializer::toQueryValue($sort_order);
        }
        // query params
        if ($start_time !== null) {
            $queryParams['start_time'] = ObjectSerializer::toQueryValue($start_time);
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
                []
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
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updatePayout
     *
     * Update payout
     *
     * @param  string $payout_id Payout ID (required)
     * @param  \Cardpay\model\PayoutUpdateRequest $payout_update_request payoutUpdateRequest (required)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cardpay\model\PayoutUpdateResponse
     */
    public function updatePayout($payout_id, $payout_update_request)
    {
        list($response) = $this->updatePayoutWithHttpInfo($payout_id, $payout_update_request);
        return $response;
    }

    /**
     * Operation updatePayoutWithHttpInfo
     *
     * Update payout
     *
     * @param  string $payout_id Payout ID (required)
     * @param  \Cardpay\model\PayoutUpdateRequest $payout_update_request payoutUpdateRequest (required)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cardpay\model\PayoutUpdateResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updatePayoutWithHttpInfo($payout_id, $payout_update_request)
    {
        $returnType = '\Cardpay\model\PayoutUpdateResponse';
        $request = $this->updatePayoutRequest($payout_id, $payout_update_request);

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
                        '\Cardpay\model\PayoutUpdateResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\BadRequestError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\AuthenticationError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\OAuthError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\NotFoundError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cardpay\model\ApiError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updatePayoutAsync
     *
     * Update payout
     *
     * @param  string $payout_id Payout ID (required)
     * @param  \Cardpay\model\PayoutUpdateRequest $payout_update_request payoutUpdateRequest (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updatePayoutAsync($payout_id, $payout_update_request)
    {
        return $this->updatePayoutAsyncWithHttpInfo($payout_id, $payout_update_request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updatePayoutAsyncWithHttpInfo
     *
     * Update payout
     *
     * @param  string $payout_id Payout ID (required)
     * @param  \Cardpay\model\PayoutUpdateRequest $payout_update_request payoutUpdateRequest (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updatePayoutAsyncWithHttpInfo($payout_id, $payout_update_request)
    {
        $returnType = '\Cardpay\model\PayoutUpdateResponse';
        $request = $this->updatePayoutRequest($payout_id, $payout_update_request);

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
     * Create request for operation 'updatePayout'
     *
     * @param  string $payout_id Payout ID (required)
     * @param  \Cardpay\model\PayoutUpdateRequest $payout_update_request payoutUpdateRequest (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updatePayoutRequest($payout_id, $payout_update_request)
    {
        // verify the required parameter 'payout_id' is set
        if ($payout_id === null || (is_array($payout_id) && count($payout_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payout_id when calling updatePayout'
            );
        }
        // verify the required parameter 'payout_update_request' is set
        if ($payout_update_request === null || (is_array($payout_update_request) && count($payout_update_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payout_update_request when calling updatePayout'
            );
        }

        $resourcePath = '/api/payouts/{payoutId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($payout_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payoutId' . '}',
                ObjectSerializer::toPathValue($payout_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($payout_update_request)) {
            $_tempBody = $payout_update_request;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
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
            'PATCH',
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
