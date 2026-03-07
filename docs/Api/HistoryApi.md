# Interserver\Mailbaby\HistoryApi

Information about already delivered emails.

All URIs are relative to https://api.mailbaby.net, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getStats()**](HistoryApi.md#getStats) | **GET** /mail/stats | Account usage statistics. |
| [**viewMailLog()**](HistoryApi.md#viewMailLog) | **GET** /mail/log | displays the mail log |


## `getStats()`

```php
getStats($time): \Interserver\Mailbaby\Model\MailStatsType
```

Account usage statistics.

Returns information about the usage on your mail accounts.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKeyAuth
$config = Interserver\Mailbaby\Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Interserver\Mailbaby\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-KEY', 'Bearer');


$apiInstance = new Interserver\Mailbaby\Api\HistoryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$time = 'time_example'; // string | The timeframe for the statistics.

try {
    $result = $apiInstance->getStats($time);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HistoryApi->getStats: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **time** | **string**| The timeframe for the statistics. | [optional] |

### Return type

[**\Interserver\Mailbaby\Model\MailStatsType**](../Model/MailStatsType.md)

### Authorization

[apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `viewMailLog()`

```php
viewMailLog($id, $origin, $mx, $from, $to, $subject, $mailid, $skip, $limit, $startDate, $endDate, $replyto, $headerfrom, $delivered): \Interserver\Mailbaby\Model\MailLog
```

displays the mail log

Get a listing of the emails sent through this system

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKeyAuth
$config = Interserver\Mailbaby\Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Interserver\Mailbaby\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-KEY', 'Bearer');


$apiInstance = new Interserver\Mailbaby\Api\HistoryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 2604; // int | The ID of your mail order this will be sent through.
$origin = 1.2.3.4; // string | originating ip address sending mail
$mx = mx.google.com; // string | mx record mail was sent to
$from = me@sender.com; // string | from email address
$to = you@receiver.com; // string | to/destination email address
$subject = Support; // string | subject containing this string
$mailid = 185997065c60008840; // string | mail id
$skip = 1000; // int | number of records to skip for pagination
$limit = 1000; // int | maximum number of records to return
$startDate = 1641781008; // int | earliest date to get emails in unix timestamp format
$endDate = 1673317008; // int | earliest date to get emails in unix timestamp format
$replyto = 'replyto_example'; // string | Reply-To Email Address
$headerfrom = 'headerfrom_example'; // string | Header From Email Address
$delivered = 'delivered_example'; // string | Limiting the emails to wether or not they were delivered.

try {
    $result = $apiInstance->viewMailLog($id, $origin, $mx, $from, $to, $subject, $mailid, $skip, $limit, $startDate, $endDate, $replyto, $headerfrom, $delivered);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HistoryApi->viewMailLog: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The ID of your mail order this will be sent through. | [optional] |
| **origin** | **string**| originating ip address sending mail | [optional] |
| **mx** | **string**| mx record mail was sent to | [optional] |
| **from** | **string**| from email address | [optional] |
| **to** | **string**| to/destination email address | [optional] |
| **subject** | **string**| subject containing this string | [optional] |
| **mailid** | **string**| mail id | [optional] |
| **skip** | **int**| number of records to skip for pagination | [optional] [default to 0] |
| **limit** | **int**| maximum number of records to return | [optional] [default to 100] |
| **startDate** | **int**| earliest date to get emails in unix timestamp format | [optional] |
| **endDate** | **int**| earliest date to get emails in unix timestamp format | [optional] |
| **replyto** | **string**| Reply-To Email Address | [optional] |
| **headerfrom** | **string**| Header From Email Address | [optional] |
| **delivered** | **string**| Limiting the emails to wether or not they were delivered. | [optional] |

### Return type

[**\Interserver\Mailbaby\Model\MailLog**](../Model/MailLog.md)

### Authorization

[apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
