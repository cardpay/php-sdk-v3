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

class RecurringsInstallmentsApi
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
     * Operation calculateSchedule
     *
     * Get calculation of installment payment options
     *
     * @param  string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code (required)
     * @param  string $request_id Request ID (required)
     * @param  float $total_amount Total amount of subscription to be calculated to options; can have dot as a decimal separator. (optional)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cardpay\model\ScheduleOptionsResponse
     */
    public function calculateSchedule($currency, $request_id, $total_amount = null)
    {
        list($response) = $this->calculateScheduleWithHttpInfo($currency, $request_id, $total_amount);
        return $response;
    }

    /**
     * Operation calculateScheduleWithHttpInfo
     *
     * Get calculation of installment payment options
     *
     * @param  string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code (required)
     * @param  string $request_id Request ID (required)
     * @param  float $total_amount Total amount of subscription to be calculated to options; can have dot as a decimal separator. (optional)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cardpay\model\ScheduleOptionsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function calculateScheduleWithHttpInfo($currency, $request_id, $total_amount = null)
    {
        $returnType = '\Cardpay\model\ScheduleOptionsResponse';
        $request = $this->calculateScheduleRequest($currency, $request_id, $total_amount);

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
                        '\Cardpay\model\ScheduleOptionsResponse',
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
     * Operation calculateScheduleAsync
     *
     * Get calculation of installment payment options
     *
     * @param  string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code (required)
     * @param  string $request_id Request ID (required)
     * @param  float $total_amount Total amount of subscription to be calculated to options; can have dot as a decimal separator. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function calculateScheduleAsync($currency, $request_id, $total_amount = null)
    {
        return $this->calculateScheduleAsyncWithHttpInfo($currency, $request_id, $total_amount)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation calculateScheduleAsyncWithHttpInfo
     *
     * Get calculation of installment payment options
     *
     * @param  string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code (required)
     * @param  string $request_id Request ID (required)
     * @param  float $total_amount Total amount of subscription to be calculated to options; can have dot as a decimal separator. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function calculateScheduleAsyncWithHttpInfo($currency, $request_id, $total_amount = null)
    {
        $returnType = '\Cardpay\model\ScheduleOptionsResponse';
        $request = $this->calculateScheduleRequest($currency, $request_id, $total_amount);

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
     * Create request for operation 'calculateSchedule'
     *
     * @param  string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code (required)
     * @param  string $request_id Request ID (required)
     * @param  float $total_amount Total amount of subscription to be calculated to options; can have dot as a decimal separator. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function calculateScheduleRequest($currency, $request_id, $total_amount = null)
    {
        // verify the required parameter 'currency' is set
        if ($currency === null || (is_array($currency) && count($currency) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $currency when calling calculateSchedule'
            );
        }
        // verify the required parameter 'request_id' is set
        if ($request_id === null || (is_array($request_id) && count($request_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $request_id when calling calculateSchedule'
            );
        }
        if (strlen($request_id) > 50) {
            throw new \InvalidArgumentException('invalid length for "$request_id" when calling RecurringsInstallmentsApi.calculateSchedule, must be smaller than or equal to 50.');
        }
        if (strlen($request_id) < 1) {
            throw new \InvalidArgumentException('invalid length for "$request_id" when calling RecurringsInstallmentsApi.calculateSchedule, must be bigger than or equal to 1.');
        }


        $resourcePath = '/api/installments/options_calculator';
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
        if ($request_id !== null) {
            $queryParams['request_id'] = ObjectSerializer::toQueryValue($request_id);
        }
        // query params
        if ($total_amount !== null) {
            $queryParams['totalAmount'] = ObjectSerializer::toQueryValue($total_amount);
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
     * Operation createInstallment
     *
     * Create installment
     *
     * @param  \Cardpay\model\InstallmentSubscriptionRequest $subscription_request subscriptionRequest (required)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cardpay\model\RecurringGatewayCreationResponse
     */
    public function createInstallment($subscription_request)
    {
        list($response) = $this->createInstallmentWithHttpInfo($subscription_request);
        return $response;
    }

    /**
     * Operation createInstallmentWithHttpInfo
     *
     * Create installment
     *
     * @param  \Cardpay\model\InstallmentSubscriptionRequest $subscription_request subscriptionRequest (required)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cardpay\model\RecurringGatewayCreationResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createInstallmentWithHttpInfo($subscription_request)
    {
        $returnType = '\Cardpay\model\RecurringGatewayCreationResponse';
        $request = $this->createInstallmentRequest($subscription_request);

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
                        '\Cardpay\model\RecurringGatewayCreationResponse',
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
     * Operation createInstallmentAsync
     *
     * Create installment
     *
     * @param  \Cardpay\model\InstallmentSubscriptionRequest $subscription_request subscriptionRequest (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createInstallmentAsync($subscription_request)
    {
        return $this->createInstallmentAsyncWithHttpInfo($subscription_request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createInstallmentAsyncWithHttpInfo
     *
     * Create installment
     *
     * @param  \Cardpay\model\InstallmentSubscriptionRequest $subscription_request subscriptionRequest (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createInstallmentAsyncWithHttpInfo($subscription_request)
    {
        $returnType = '\Cardpay\model\RecurringGatewayCreationResponse';
        $request = $this->createInstallmentRequest($subscription_request);

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
     * Create request for operation 'createInstallment'
     *
     * @param  \Cardpay\model\InstallmentSubscriptionRequest $subscription_request subscriptionRequest (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createInstallmentRequest($subscription_request)
    {
        // verify the required parameter 'subscription_request' is set
        if ($subscription_request === null || (is_array($subscription_request) && count($subscription_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription_request when calling createInstallment'
            );
        }

        $resourcePath = '/api/installments';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($subscription_request)) {
            $_tempBody = $subscription_request;
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
     * Operation getAuthenticationData
     *
     * Get installment payment 3DS result information
     *
     * @param  string $recurring_id Recurring ID (required)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cardpay\model\AuthenticationDataResponse
     */
    public function getAuthenticationData($recurring_id)
    {
        list($response) = $this->getAuthenticationDataWithHttpInfo($recurring_id);
        return $response;
    }

    /**
     * Operation getAuthenticationDataWithHttpInfo
     *
     * Get installment payment 3DS result information
     *
     * @param  string $recurring_id Recurring ID (required)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cardpay\model\AuthenticationDataResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAuthenticationDataWithHttpInfo($recurring_id)
    {
        $returnType = '\Cardpay\model\AuthenticationDataResponse';
        $request = $this->getAuthenticationDataRequest($recurring_id);

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
                        '\Cardpay\model\AuthenticationDataResponse',
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
     * Operation getAuthenticationDataAsync
     *
     * Get installment payment 3DS result information
     *
     * @param  string $recurring_id Recurring ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAuthenticationDataAsync($recurring_id)
    {
        return $this->getAuthenticationDataAsyncWithHttpInfo($recurring_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAuthenticationDataAsyncWithHttpInfo
     *
     * Get installment payment 3DS result information
     *
     * @param  string $recurring_id Recurring ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAuthenticationDataAsyncWithHttpInfo($recurring_id)
    {
        $returnType = '\Cardpay\model\AuthenticationDataResponse';
        $request = $this->getAuthenticationDataRequest($recurring_id);

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
     * Create request for operation 'getAuthenticationData'
     *
     * @param  string $recurring_id Recurring ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getAuthenticationDataRequest($recurring_id)
    {
        // verify the required parameter 'recurring_id' is set
        if ($recurring_id === null || (is_array($recurring_id) && count($recurring_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $recurring_id when calling getAuthenticationData'
            );
        }

        $resourcePath = '/api/installments/{recurringId}/threedsecure';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($recurring_id !== null) {
            $resourcePath = str_replace(
                '{' . 'recurringId' . '}',
                ObjectSerializer::toPathValue($recurring_id),
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
     * Operation getInstallmentPayment
     *
     * Get installment payment
     *
     * @param  string $recurring_id Recurring ID (required)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cardpay\model\RecurringResponse
     */
    public function getInstallmentPayment($recurring_id)
    {
        list($response) = $this->getInstallmentPaymentWithHttpInfo($recurring_id);
        return $response;
    }

    /**
     * Operation getInstallmentPaymentWithHttpInfo
     *
     * Get installment payment
     *
     * @param  string $recurring_id Recurring ID (required)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cardpay\model\RecurringResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getInstallmentPaymentWithHttpInfo($recurring_id)
    {
        $returnType = '\Cardpay\model\RecurringResponse';
        $request = $this->getInstallmentPaymentRequest($recurring_id);

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
                        '\Cardpay\model\RecurringResponse',
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
     * Operation getInstallmentPaymentAsync
     *
     * Get installment payment
     *
     * @param  string $recurring_id Recurring ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getInstallmentPaymentAsync($recurring_id)
    {
        return $this->getInstallmentPaymentAsyncWithHttpInfo($recurring_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getInstallmentPaymentAsyncWithHttpInfo
     *
     * Get installment payment
     *
     * @param  string $recurring_id Recurring ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getInstallmentPaymentAsyncWithHttpInfo($recurring_id)
    {
        $returnType = '\Cardpay\model\RecurringResponse';
        $request = $this->getInstallmentPaymentRequest($recurring_id);

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
     * Create request for operation 'getInstallmentPayment'
     *
     * @param  string $recurring_id Recurring ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getInstallmentPaymentRequest($recurring_id)
    {
        // verify the required parameter 'recurring_id' is set
        if ($recurring_id === null || (is_array($recurring_id) && count($recurring_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $recurring_id when calling getInstallmentPayment'
            );
        }

        $resourcePath = '/api/installments/{recurringId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($recurring_id !== null) {
            $resourcePath = str_replace(
                '{' . 'recurringId' . '}',
                ObjectSerializer::toPathValue($recurring_id),
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
     * Operation getInstallmentPayments
     *
     * Get installment payments
     *
     * @param  string $request_id Request ID (required)
     * @param  string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code of transactions currency (optional)
     * @param  \DateTime $end_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period ends (not inclusive), UTC time, must be less than 7 days after &#39;start_time&#39;, default is current time (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     * @param  int $max_count Limit number of returned transactions (must be less than 10000, default is 1000, minimal value is 1) (optional)
     * @param  string $merchant_order_id Merchant order number from the merchant system (optional)
     * @param  string $payment_method Used payment method type name from payment methods list (optional)
     * @param  string[] $recurring_types recurring_types (optional)
     * @param  string $sort_order Sort based on order of results. &#x60;asc&#x60; for ascending order or &#x60;desc&#x60; for descending order (default value) (optional)
     * @param  \DateTime $start_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period starts (inclusive), UTC time, default is 24 hours before &#39;end_time&#39; (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     * @param  string $type Filter recurring payments by certain type (applicable to /api/recurrings endpoint only): &#x60;SCHEDULED&#x60; for scheduled recurring payments &#x60;ONECLICK&#x60; for one-click payments &#x60;INSTALLMENT&#x60; for installment payments (optional)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cardpay\model\RecurringsList
     */
    public function getInstallmentPayments($request_id, $currency = null, $end_time = null, $max_count = null, $merchant_order_id = null, $payment_method = null, $recurring_types = null, $sort_order = null, $start_time = null, $type = null)
    {
        list($response) = $this->getInstallmentPaymentsWithHttpInfo($request_id, $currency, $end_time, $max_count, $merchant_order_id, $payment_method, $recurring_types, $sort_order, $start_time, $type);
        return $response;
    }

    /**
     * Operation getInstallmentPaymentsWithHttpInfo
     *
     * Get installment payments
     *
     * @param  string $request_id Request ID (required)
     * @param  string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code of transactions currency (optional)
     * @param  \DateTime $end_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period ends (not inclusive), UTC time, must be less than 7 days after &#39;start_time&#39;, default is current time (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     * @param  int $max_count Limit number of returned transactions (must be less than 10000, default is 1000, minimal value is 1) (optional)
     * @param  string $merchant_order_id Merchant order number from the merchant system (optional)
     * @param  string $payment_method Used payment method type name from payment methods list (optional)
     * @param  string[] $recurring_types (optional)
     * @param  string $sort_order Sort based on order of results. &#x60;asc&#x60; for ascending order or &#x60;desc&#x60; for descending order (default value) (optional)
     * @param  \DateTime $start_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period starts (inclusive), UTC time, default is 24 hours before &#39;end_time&#39; (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     * @param  string $type Filter recurring payments by certain type (applicable to /api/recurrings endpoint only): &#x60;SCHEDULED&#x60; for scheduled recurring payments &#x60;ONECLICK&#x60; for one-click payments &#x60;INSTALLMENT&#x60; for installment payments (optional)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cardpay\model\RecurringsList, HTTP status code, HTTP response headers (array of strings)
     */
    public function getInstallmentPaymentsWithHttpInfo($request_id, $currency = null, $end_time = null, $max_count = null, $merchant_order_id = null, $payment_method = null, $recurring_types = null, $sort_order = null, $start_time = null, $type = null)
    {
        $returnType = '\Cardpay\model\RecurringsList';
        $request = $this->getInstallmentPaymentsRequest($request_id, $currency, $end_time, $max_count, $merchant_order_id, $payment_method, $recurring_types, $sort_order, $start_time, $type);

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
                        '\Cardpay\model\RecurringsList',
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
     * Operation getInstallmentPaymentsAsync
     *
     * Get installment payments
     *
     * @param  string $request_id Request ID (required)
     * @param  string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code of transactions currency (optional)
     * @param  \DateTime $end_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period ends (not inclusive), UTC time, must be less than 7 days after &#39;start_time&#39;, default is current time (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     * @param  int $max_count Limit number of returned transactions (must be less than 10000, default is 1000, minimal value is 1) (optional)
     * @param  string $merchant_order_id Merchant order number from the merchant system (optional)
     * @param  string $payment_method Used payment method type name from payment methods list (optional)
     * @param  string[] $recurring_types (optional)
     * @param  string $sort_order Sort based on order of results. &#x60;asc&#x60; for ascending order or &#x60;desc&#x60; for descending order (default value) (optional)
     * @param  \DateTime $start_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period starts (inclusive), UTC time, default is 24 hours before &#39;end_time&#39; (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     * @param  string $type Filter recurring payments by certain type (applicable to /api/recurrings endpoint only): &#x60;SCHEDULED&#x60; for scheduled recurring payments &#x60;ONECLICK&#x60; for one-click payments &#x60;INSTALLMENT&#x60; for installment payments (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getInstallmentPaymentsAsync($request_id, $currency = null, $end_time = null, $max_count = null, $merchant_order_id = null, $payment_method = null, $recurring_types = null, $sort_order = null, $start_time = null, $type = null)
    {
        return $this->getInstallmentPaymentsAsyncWithHttpInfo($request_id, $currency, $end_time, $max_count, $merchant_order_id, $payment_method, $recurring_types, $sort_order, $start_time, $type)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getInstallmentPaymentsAsyncWithHttpInfo
     *
     * Get installment payments
     *
     * @param  string $request_id Request ID (required)
     * @param  string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code of transactions currency (optional)
     * @param  \DateTime $end_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period ends (not inclusive), UTC time, must be less than 7 days after &#39;start_time&#39;, default is current time (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     * @param  int $max_count Limit number of returned transactions (must be less than 10000, default is 1000, minimal value is 1) (optional)
     * @param  string $merchant_order_id Merchant order number from the merchant system (optional)
     * @param  string $payment_method Used payment method type name from payment methods list (optional)
     * @param  string[] $recurring_types (optional)
     * @param  string $sort_order Sort based on order of results. &#x60;asc&#x60; for ascending order or &#x60;desc&#x60; for descending order (default value) (optional)
     * @param  \DateTime $start_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period starts (inclusive), UTC time, default is 24 hours before &#39;end_time&#39; (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     * @param  string $type Filter recurring payments by certain type (applicable to /api/recurrings endpoint only): &#x60;SCHEDULED&#x60; for scheduled recurring payments &#x60;ONECLICK&#x60; for one-click payments &#x60;INSTALLMENT&#x60; for installment payments (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getInstallmentPaymentsAsyncWithHttpInfo($request_id, $currency = null, $end_time = null, $max_count = null, $merchant_order_id = null, $payment_method = null, $recurring_types = null, $sort_order = null, $start_time = null, $type = null)
    {
        $returnType = '\Cardpay\model\RecurringsList';
        $request = $this->getInstallmentPaymentsRequest($request_id, $currency, $end_time, $max_count, $merchant_order_id, $payment_method, $recurring_types, $sort_order, $start_time, $type);

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
     * Create request for operation 'getInstallmentPayments'
     *
     * @param  string $request_id Request ID (required)
     * @param  string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code of transactions currency (optional)
     * @param  \DateTime $end_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period ends (not inclusive), UTC time, must be less than 7 days after &#39;start_time&#39;, default is current time (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     * @param  int $max_count Limit number of returned transactions (must be less than 10000, default is 1000, minimal value is 1) (optional)
     * @param  string $merchant_order_id Merchant order number from the merchant system (optional)
     * @param  string $payment_method Used payment method type name from payment methods list (optional)
     * @param  string[] $recurring_types (optional)
     * @param  string $sort_order Sort based on order of results. &#x60;asc&#x60; for ascending order or &#x60;desc&#x60; for descending order (default value) (optional)
     * @param  \DateTime $start_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period starts (inclusive), UTC time, default is 24 hours before &#39;end_time&#39; (format: yyyy-MM-dd&#39;T&#39;HH:mm:ss&#39;Z&#39;) (optional)
     * @param  string $type Filter recurring payments by certain type (applicable to /api/recurrings endpoint only): &#x60;SCHEDULED&#x60; for scheduled recurring payments &#x60;ONECLICK&#x60; for one-click payments &#x60;INSTALLMENT&#x60; for installment payments (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getInstallmentPaymentsRequest($request_id, $currency = null, $end_time = null, $max_count = null, $merchant_order_id = null, $payment_method = null, $recurring_types = null, $sort_order = null, $start_time = null, $type = null)
    {
        // verify the required parameter 'request_id' is set
        if ($request_id === null || (is_array($request_id) && count($request_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $request_id when calling getInstallmentPayments'
            );
        }
        if (strlen($request_id) > 50) {
            throw new \InvalidArgumentException('invalid length for "$request_id" when calling RecurringsInstallmentsApi.getInstallmentPayments, must be smaller than or equal to 50.');
        }
        if (strlen($request_id) < 1) {
            throw new \InvalidArgumentException('invalid length for "$request_id" when calling RecurringsInstallmentsApi.getInstallmentPayments, must be bigger than or equal to 1.');
        }

        if ($max_count !== null && $max_count > 10000) {
            throw new \InvalidArgumentException('invalid value for "$max_count" when calling RecurringsInstallmentsApi.getInstallmentPayments, must be smaller than or equal to 10000.');
        }
        if ($max_count !== null && $max_count < 1) {
            throw new \InvalidArgumentException('invalid value for "$max_count" when calling RecurringsInstallmentsApi.getInstallmentPayments, must be bigger than or equal to 1.');
        }

        if ($merchant_order_id !== null && strlen($merchant_order_id) > 50) {
            throw new \InvalidArgumentException('invalid length for "$merchant_order_id" when calling RecurringsInstallmentsApi.getInstallmentPayments, must be smaller than or equal to 50.');
        }
        if ($merchant_order_id !== null && strlen($merchant_order_id) < 0) {
            throw new \InvalidArgumentException('invalid length for "$merchant_order_id" when calling RecurringsInstallmentsApi.getInstallmentPayments, must be bigger than or equal to 0.');
        }

        if ($payment_method !== null && strlen($payment_method) > 50) {
            throw new \InvalidArgumentException('invalid length for "$payment_method" when calling RecurringsInstallmentsApi.getInstallmentPayments, must be smaller than or equal to 50.');
        }
        if ($payment_method !== null && strlen($payment_method) < 0) {
            throw new \InvalidArgumentException('invalid length for "$payment_method" when calling RecurringsInstallmentsApi.getInstallmentPayments, must be bigger than or equal to 0.');
        }

        if ($sort_order !== null && !preg_match("/asc|desc/", $sort_order)) {
            throw new \InvalidArgumentException("invalid value for \"sort_order\" when calling RecurringsInstallmentsApi.getInstallmentPayments, must conform to the pattern /asc|desc/.");
        }


        $resourcePath = '/api/installments';
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
        if (is_array($recurring_types)) {
            $recurring_types = ObjectSerializer::serializeCollection($recurring_types, 'multi', true);
        }
        if ($recurring_types !== null) {
            $queryParams['recurring_types'] = ObjectSerializer::toQueryValue($recurring_types);
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
        // query params
        if ($type !== null) {
            $queryParams['type'] = ObjectSerializer::toQueryValue($type);
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
     * Operation updateInstallmentPayment
     *
     * Update installment payment
     *
     * @param  string $recurring_id Recurring ID (required)
     * @param  \Cardpay\model\RecurringPatchRequest $recurring_patch_request Recurring patch request (required)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cardpay\model\RecurringResponse
     */
    public function updateInstallmentPayment($recurring_id, $recurring_patch_request)
    {
        list($response) = $this->updateInstallmentPaymentWithHttpInfo($recurring_id, $recurring_patch_request);
        return $response;
    }

    /**
     * Operation updateInstallmentPaymentWithHttpInfo
     *
     * Update installment payment
     *
     * @param  string $recurring_id Recurring ID (required)
     * @param  \Cardpay\model\RecurringPatchRequest $recurring_patch_request Recurring patch request (required)
     *
     * @throws \Cardpay\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cardpay\model\RecurringResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateInstallmentPaymentWithHttpInfo($recurring_id, $recurring_patch_request)
    {
        $returnType = '\Cardpay\model\RecurringResponse';
        $request = $this->updateInstallmentPaymentRequest($recurring_id, $recurring_patch_request);

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
                        '\Cardpay\model\RecurringResponse',
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
     * Operation updateInstallmentPaymentAsync
     *
     * Update installment payment
     *
     * @param  string $recurring_id Recurring ID (required)
     * @param  \Cardpay\model\RecurringPatchRequest $recurring_patch_request Recurring patch request (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateInstallmentPaymentAsync($recurring_id, $recurring_patch_request)
    {
        return $this->updateInstallmentPaymentAsyncWithHttpInfo($recurring_id, $recurring_patch_request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateInstallmentPaymentAsyncWithHttpInfo
     *
     * Update installment payment
     *
     * @param  string $recurring_id Recurring ID (required)
     * @param  \Cardpay\model\RecurringPatchRequest $recurring_patch_request Recurring patch request (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateInstallmentPaymentAsyncWithHttpInfo($recurring_id, $recurring_patch_request)
    {
        $returnType = '\Cardpay\model\RecurringResponse';
        $request = $this->updateInstallmentPaymentRequest($recurring_id, $recurring_patch_request);

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
     * Create request for operation 'updateInstallmentPayment'
     *
     * @param  string $recurring_id Recurring ID (required)
     * @param  \Cardpay\model\RecurringPatchRequest $recurring_patch_request Recurring patch request (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateInstallmentPaymentRequest($recurring_id, $recurring_patch_request)
    {
        // verify the required parameter 'recurring_id' is set
        if ($recurring_id === null || (is_array($recurring_id) && count($recurring_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $recurring_id when calling updateInstallmentPayment'
            );
        }
        // verify the required parameter 'recurring_patch_request' is set
        if ($recurring_patch_request === null || (is_array($recurring_patch_request) && count($recurring_patch_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $recurring_patch_request when calling updateInstallmentPayment'
            );
        }

        $resourcePath = '/api/installments/{recurringId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($recurring_id !== null) {
            $resourcePath = str_replace(
                '{' . 'recurringId' . '}',
                ObjectSerializer::toPathValue($recurring_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($recurring_patch_request)) {
            $_tempBody = $recurring_patch_request;
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
