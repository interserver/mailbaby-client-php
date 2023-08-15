<?php
/**
 * HistoryApi
 * PHP version 7.4
 *
 * @category Class
 * @package  Interserver\Mailbaby
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * MailBaby Email Delivery and Management Service API
 *
 * **Send emails fast and with confidence through our easy to use [REST](https://en.wikipedia.org/wiki/Representational_state_transfer) API interface.** # Overview This is the API interface to the [Mail Baby](https//mail.baby/) Mail services provided by [InterServer](https://www.interserver.net). To use this service you must have an account with us at [my.interserver.net](https://my.interserver.net). # Authentication In order to use most of the API calls you must pass credentials from the [my.interserver.net](https://my.interserver.net/) site. We support several different authentication methods but the preferred method is to use the **API Key** which you can get from the [Account Security](https://my.interserver.net/account_security) page.
 *
 * The version of the OpenAPI document: 1.1.0
 * Contact: support@interserver.net
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.6.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Interserver\Mailbaby\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Interserver\Mailbaby\ApiException;
use Interserver\Mailbaby\Configuration;
use Interserver\Mailbaby\HeaderSelector;
use Interserver\Mailbaby\ObjectSerializer;

/**
 * HistoryApi Class Doc Comment
 *
 * @category Class
 * @package  Interserver\Mailbaby
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class HistoryApi
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
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'getStats' => [
            'application/json',
        ],
        'viewMailLog' => [
            'application/json',
        ],
    ];

/**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getStats
     *
     * displays a list of blocked email addresses
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getStats'] to see the possible values for this operation
     *
     * @throws \Interserver\Mailbaby\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Interserver\Mailbaby\Model\GetStats200ResponseInner[]|\Interserver\Mailbaby\Model\GetMailOrders401Response|\Interserver\Mailbaby\Model\GetMailOrders401Response
     */
    public function getStats(string $contentType = self::contentTypes['getStats'][0])
    {
        list($response) = $this->getStatsWithHttpInfo($contentType);
        return $response;
    }

    /**
     * Operation getStatsWithHttpInfo
     *
     * displays a list of blocked email addresses
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getStats'] to see the possible values for this operation
     *
     * @throws \Interserver\Mailbaby\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Interserver\Mailbaby\Model\GetStats200ResponseInner[]|\Interserver\Mailbaby\Model\GetMailOrders401Response|\Interserver\Mailbaby\Model\GetMailOrders401Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function getStatsWithHttpInfo(string $contentType = self::contentTypes['getStats'][0])
    {
        $request = $this->getStatsRequest($contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Interserver\Mailbaby\Model\GetStats200ResponseInner[]' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Interserver\Mailbaby\Model\GetStats200ResponseInner[]' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Interserver\Mailbaby\Model\GetStats200ResponseInner[]', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Interserver\Mailbaby\Model\GetMailOrders401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Interserver\Mailbaby\Model\GetMailOrders401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Interserver\Mailbaby\Model\GetMailOrders401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\Interserver\Mailbaby\Model\GetMailOrders401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Interserver\Mailbaby\Model\GetMailOrders401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Interserver\Mailbaby\Model\GetMailOrders401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Interserver\Mailbaby\Model\GetStats200ResponseInner[]';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
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
                        '\Interserver\Mailbaby\Model\GetStats200ResponseInner[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Interserver\Mailbaby\Model\GetMailOrders401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Interserver\Mailbaby\Model\GetMailOrders401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getStatsAsync
     *
     * displays a list of blocked email addresses
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getStats'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getStatsAsync(string $contentType = self::contentTypes['getStats'][0])
    {
        return $this->getStatsAsyncWithHttpInfo($contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getStatsAsyncWithHttpInfo
     *
     * displays a list of blocked email addresses
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getStats'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getStatsAsyncWithHttpInfo(string $contentType = self::contentTypes['getStats'][0])
    {
        $returnType = '\Interserver\Mailbaby\Model\GetStats200ResponseInner[]';
        $request = $this->getStatsRequest($contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
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
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getStats'
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getStats'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getStatsRequest(string $contentType = self::contentTypes['getStats'][0])
    {


        $resourcePath = '/mail/stats';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation viewMailLog
     *
     * displays the mail log
     *
     * @param  int $id The ID of your mail order this will be sent through. (optional)
     * @param  string $origin originating ip address sending mail (optional)
     * @param  string $mx mx record mail was sent to (optional)
     * @param  string $from from email address (optional)
     * @param  string $to to/destination email address (optional)
     * @param  string $subject subject containing this string (optional)
     * @param  string $mailid mail id (optional)
     * @param  int $skip number of records to skip for pagination (optional, default to 0)
     * @param  int $limit maximum number of records to return (optional, default to 100)
     * @param  int $startDate earliest date to get emails in unix timestamp format (optional)
     * @param  int $endDate earliest date to get emails in unix timestamp format (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['viewMailLog'] to see the possible values for this operation
     *
     * @throws \Interserver\Mailbaby\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Interserver\Mailbaby\Model\MailLog
     */
    public function viewMailLog($id = null, $origin = null, $mx = null, $from = null, $to = null, $subject = null, $mailid = null, $skip = 0, $limit = 100, $startDate = null, $endDate = null, string $contentType = self::contentTypes['viewMailLog'][0])
    {
        list($response) = $this->viewMailLogWithHttpInfo($id, $origin, $mx, $from, $to, $subject, $mailid, $skip, $limit, $startDate, $endDate, $contentType);
        return $response;
    }

    /**
     * Operation viewMailLogWithHttpInfo
     *
     * displays the mail log
     *
     * @param  int $id The ID of your mail order this will be sent through. (optional)
     * @param  string $origin originating ip address sending mail (optional)
     * @param  string $mx mx record mail was sent to (optional)
     * @param  string $from from email address (optional)
     * @param  string $to to/destination email address (optional)
     * @param  string $subject subject containing this string (optional)
     * @param  string $mailid mail id (optional)
     * @param  int $skip number of records to skip for pagination (optional, default to 0)
     * @param  int $limit maximum number of records to return (optional, default to 100)
     * @param  int $startDate earliest date to get emails in unix timestamp format (optional)
     * @param  int $endDate earliest date to get emails in unix timestamp format (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['viewMailLog'] to see the possible values for this operation
     *
     * @throws \Interserver\Mailbaby\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Interserver\Mailbaby\Model\MailLog, HTTP status code, HTTP response headers (array of strings)
     */
    public function viewMailLogWithHttpInfo($id = null, $origin = null, $mx = null, $from = null, $to = null, $subject = null, $mailid = null, $skip = 0, $limit = 100, $startDate = null, $endDate = null, string $contentType = self::contentTypes['viewMailLog'][0])
    {
        $request = $this->viewMailLogRequest($id, $origin, $mx, $from, $to, $subject, $mailid, $skip, $limit, $startDate, $endDate, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Interserver\Mailbaby\Model\MailLog' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Interserver\Mailbaby\Model\MailLog' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Interserver\Mailbaby\Model\MailLog', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Interserver\Mailbaby\Model\MailLog';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
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
                        '\Interserver\Mailbaby\Model\MailLog',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation viewMailLogAsync
     *
     * displays the mail log
     *
     * @param  int $id The ID of your mail order this will be sent through. (optional)
     * @param  string $origin originating ip address sending mail (optional)
     * @param  string $mx mx record mail was sent to (optional)
     * @param  string $from from email address (optional)
     * @param  string $to to/destination email address (optional)
     * @param  string $subject subject containing this string (optional)
     * @param  string $mailid mail id (optional)
     * @param  int $skip number of records to skip for pagination (optional, default to 0)
     * @param  int $limit maximum number of records to return (optional, default to 100)
     * @param  int $startDate earliest date to get emails in unix timestamp format (optional)
     * @param  int $endDate earliest date to get emails in unix timestamp format (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['viewMailLog'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function viewMailLogAsync($id = null, $origin = null, $mx = null, $from = null, $to = null, $subject = null, $mailid = null, $skip = 0, $limit = 100, $startDate = null, $endDate = null, string $contentType = self::contentTypes['viewMailLog'][0])
    {
        return $this->viewMailLogAsyncWithHttpInfo($id, $origin, $mx, $from, $to, $subject, $mailid, $skip, $limit, $startDate, $endDate, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation viewMailLogAsyncWithHttpInfo
     *
     * displays the mail log
     *
     * @param  int $id The ID of your mail order this will be sent through. (optional)
     * @param  string $origin originating ip address sending mail (optional)
     * @param  string $mx mx record mail was sent to (optional)
     * @param  string $from from email address (optional)
     * @param  string $to to/destination email address (optional)
     * @param  string $subject subject containing this string (optional)
     * @param  string $mailid mail id (optional)
     * @param  int $skip number of records to skip for pagination (optional, default to 0)
     * @param  int $limit maximum number of records to return (optional, default to 100)
     * @param  int $startDate earliest date to get emails in unix timestamp format (optional)
     * @param  int $endDate earliest date to get emails in unix timestamp format (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['viewMailLog'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function viewMailLogAsyncWithHttpInfo($id = null, $origin = null, $mx = null, $from = null, $to = null, $subject = null, $mailid = null, $skip = 0, $limit = 100, $startDate = null, $endDate = null, string $contentType = self::contentTypes['viewMailLog'][0])
    {
        $returnType = '\Interserver\Mailbaby\Model\MailLog';
        $request = $this->viewMailLogRequest($id, $origin, $mx, $from, $to, $subject, $mailid, $skip, $limit, $startDate, $endDate, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
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
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'viewMailLog'
     *
     * @param  int $id The ID of your mail order this will be sent through. (optional)
     * @param  string $origin originating ip address sending mail (optional)
     * @param  string $mx mx record mail was sent to (optional)
     * @param  string $from from email address (optional)
     * @param  string $to to/destination email address (optional)
     * @param  string $subject subject containing this string (optional)
     * @param  string $mailid mail id (optional)
     * @param  int $skip number of records to skip for pagination (optional, default to 0)
     * @param  int $limit maximum number of records to return (optional, default to 100)
     * @param  int $startDate earliest date to get emails in unix timestamp format (optional)
     * @param  int $endDate earliest date to get emails in unix timestamp format (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['viewMailLog'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function viewMailLogRequest($id = null, $origin = null, $mx = null, $from = null, $to = null, $subject = null, $mailid = null, $skip = 0, $limit = 100, $startDate = null, $endDate = null, string $contentType = self::contentTypes['viewMailLog'][0])
    {








        if ($skip !== null && $skip < 0) {
            throw new \InvalidArgumentException('invalid value for "$skip" when calling HistoryApi.viewMailLog, must be bigger than or equal to 0.');
        }
        
        if ($limit !== null && $limit > 10000) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling HistoryApi.viewMailLog, must be smaller than or equal to 10000.');
        }
        if ($limit !== null && $limit < 1) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling HistoryApi.viewMailLog, must be bigger than or equal to 1.');
        }
        
        if ($startDate !== null && $startDate > 9999999999) {
            throw new \InvalidArgumentException('invalid value for "$startDate" when calling HistoryApi.viewMailLog, must be smaller than or equal to 9999999999.');
        }
        if ($startDate !== null && $startDate < 0) {
            throw new \InvalidArgumentException('invalid value for "$startDate" when calling HistoryApi.viewMailLog, must be bigger than or equal to 0.');
        }
        
        if ($endDate !== null && $endDate > 9999999999) {
            throw new \InvalidArgumentException('invalid value for "$endDate" when calling HistoryApi.viewMailLog, must be smaller than or equal to 9999999999.');
        }
        if ($endDate !== null && $endDate < 0) {
            throw new \InvalidArgumentException('invalid value for "$endDate" when calling HistoryApi.viewMailLog, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/mail/log';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $id,
            'id', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $origin,
            'origin', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $mx,
            'mx', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $from,
            'from', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $to,
            'to', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $subject,
            'subject', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $mailid,
            'mailid', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $skip,
            'skip', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $limit,
            'limit', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $startDate,
            'startDate', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $endDate,
            'endDate', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
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
