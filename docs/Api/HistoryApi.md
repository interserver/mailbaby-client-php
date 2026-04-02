# Interserver\Mailbaby\HistoryApi

Query sent mail logs and account usage statistics.

All URIs are relative to https://api.mailbaby.net, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getStats()**](HistoryApi.md#getStats) | **GET** /mail/stats | Account usage statistics |
| [**viewMailLog()**](HistoryApi.md#viewMailLog) | **GET** /mail/log | Displays the mail log |


## `getStats()`

```php
getStats($time): \Interserver\Mailbaby\Model\MailStatsType
```

Account usage statistics

Returns aggregate sending statistics for your mail account(s) across a selectable time window.  Useful for dashboards, billing reviews, and detecting unusual traffic patterns.  The response includes: - **`usage`** — total messages accepted by the relay during the current billing   cycle (used for cost calculation). - **`cost`** — estimated cost for the billing cycle based on the base plan price   plus per-email charges. - **`received`** / **`sent`** — count of messages accepted by the relay /   successfully delivered to the destination MX within the selected `time` window. - **`volume`** — top-500 breakdown of message counts grouped by source IP (`ip`),   destination address (`to`), and sender address (`from`) within the selected window.   **Time windows** (controlled by the `time` parameter): | Value | Window | |-------|--------| | `1h` | Last 1 hour (default) | | `24h` | Last 24 hours | | `7d` | Last 7 days | | `month` | Current calendar month (1st to now) | | `day` | Today (midnight to now) | | `billing` | Current billing cycle (last invoice date to next invoice date) | | `all` | All time |

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
$time = '1h'; // string | The time window to scope `received`, `sent`, and `volume` statistics. Does not affect `usage` or `cost`, which are always calculated over the current billing cycle. Defaults to `1h`.

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
| **time** | **string**| The time window to scope &#x60;received&#x60;, &#x60;sent&#x60;, and &#x60;volume&#x60; statistics. Does not affect &#x60;usage&#x60; or &#x60;cost&#x60;, which are always calculated over the current billing cycle. Defaults to &#x60;1h&#x60;. | [optional] [default to &#39;1h&#39;] |

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
viewMailLog($id, $origin, $mx, $from, $to, $subject, $mailid, $messageId, $replyto, $headerfrom, $delivered, $skip, $limit, $startDate, $endDate, $sort, $dir, $groupby): \Interserver\Mailbaby\Model\MailLog
```

Displays the mail log

Returns a paginated list of every email message accepted by the relay for your mail account(s).  All filter parameters are optional and combinable.  **Row grouping** is controlled by the `groupby` parameter.  By default (`groupby=recipient`), the response contains one row per delivery attempt — so a single message sent to 4 recipients produces 4 rows, each with its own `recipient`, `delivered`, `response`, and `mxHostname` values.  Set `groupby=message` to collapse to one row per message (delivery fields will reflect one arbitrary recipient).  **Pagination** is controlled by `skip` and `limit`.  The `total` in the response reflects the row count **after** grouping, so it matches the number of pages you need to fetch.  **Date filtering** accepts either a Unix timestamp (integer) or a date string parseable by PHP `strtotime()` such as `2024-01-15`, `last monday`, or `2024-01-01 00:00:00`.  Examples: `startDate=1704067200&endDate=1706745599` or `startDate=2024-01-01&endDate=2024-01-31`.  **Sorting** is controlled by `sort` and `dir`.  Currently the only sort key is `time` (default), which orders by internal row ID.  **Delivery status** can be filtered with the `delivered` parameter: `delivered=1` returns only successfully delivered messages; `delivered=0` returns messages still in queue or that failed.  **Address filtering** distinguishes between the SMTP envelope address (`from`, `to`) and message headers (`headerfrom` for the `From:` header, `replyto` for `Reply-To:`). These may differ when a message is sent on behalf of another address.  The `mailid` parameter corresponds to the `id` field in the returned `MailLogEntry` objects, **not** the `_id` field.  It also matches the transaction ID returned in the `text` field of a successful send response from `/mail/send`, `/mail/advsend`, or `/mail/rawsend`.  The `messageId` parameter searches the `Message-ID` email header (case-insensitive substring match).

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
$id = 2604; // int | The numeric ID of the mail order to filter by.  When omitted, logs from the first active mail order are returned.  Obtain valid IDs from `GET /mail` or `GET /mail/{id}`.
$origin = 1.2.3.4; // string | Filter by the originating IP address from which the message was submitted to the relay.  Must be a valid IPv4 or IPv6 address.
$mx = mx.google.com; // string | Filter by the MX hostname the relay attempted delivery to.  For example `mx.google.com` would return messages destined for Gmail recipients. Maps to `mxHostname` in the `MailLogEntry` response.
$from = me@sender.com; // string | Filter by SMTP envelope `MAIL FROM` address (exact match).  This is the address the relay used for bounce handling and may differ from the `From:` message header.  For header-level filtering use `headerfrom`.
$to = you@receiver.com; // string | Filter by SMTP envelope `RCPT TO` address (exact match).  This is the delivery address used by the relay and may differ from the `To:` header when BCC recipients are involved.
$subject = Your order has shipped; // string | Filter by email `Subject` header (exact match).  To search for a substring, include it in the full subject text.
$mailid = 185997065c60008840; // string | Filter by the relay-assigned mail ID string (exact match).  This corresponds to the `id` field in `MailLogEntry` and to the `text` value returned by the sending endpoints on success.  Format is an 18–19 character hexadecimal string such as `185997065c60008840`.
$messageId = <abc123@yourdomain.com>; // string | Filter by the `Message-ID` email header using a substring (case-insensitive) match. The `Message-ID` is assigned by the sending mail client and is visible in the `messageId` field of `MailLogEntry`.  Useful when you know the message ID generated by your application but not the relay `mailid`.
$replyto = replies@sender.com; // string | Filter by the `Reply-To` message header address (exact match).  Only returns messages where this header was explicitly set.
$headerfrom = newsletter@sender.com; // string | Filter by the `From` message header address (exact match).  This is the human-visible sender address and may differ from the SMTP envelope `from` parameter when sending on behalf of another address.
$delivered = 1; // int | Filter by delivery status.  `1` returns only messages that were successfully delivered to the destination MX.  `0` returns messages that are still queued, deferred, or failed.  Omit to return all messages regardless of delivery status.
$skip = 0; // int | Number of records to skip for pagination.  Use in combination with `limit` to page through large result sets.  Defaults to `0` (no skip).
$limit = 100; // int | Maximum number of records to return per page.  Defaults to `100`. Maximum allowed value is `10000`.  The response also includes a `total` field with the full matched count so you can calculate the number of pages.
$startDate = 1641781008; // \Interserver\Mailbaby\Model\ViewMailLogStartDateParameter | Earliest date to include.  Accepts either a Unix timestamp (integer seconds since epoch) or a date string parseable by `strtotime()` such as `2024-01-15` or `last monday`.  Messages with a `time` value **greater than or equal to** this value will be included.
$endDate = 1673317008; // \Interserver\Mailbaby\Model\ViewMailLogStartDateParameter | Latest date to include.  Accepts either a Unix timestamp (integer seconds since epoch) or a date string parseable by `strtotime()` such as `2024-01-31` or `yesterday`. Messages with a `time` value **less than or equal to** this value will be included.
$sort = time; // string | Field to sort results by.  Currently only `time` is supported (sorts by internal row ID which corresponds to chronological order).
$dir = desc; // string | Sort direction.  `desc` returns newest first (default), `asc` returns oldest first.
$groupby = recipient; // string | Controls how results are grouped.  `recipient` (default) returns one row per delivery attempt — a message sent to 4 recipients produces 4 rows, each with its own `recipient`, `delivered`, `response`, and delivery metadata.  `message` collapses to one row per unique message ID; delivery-level fields will reflect one arbitrary recipient per message.  The `total` count in the response matches the grouping mode.

try {
    $result = $apiInstance->viewMailLog($id, $origin, $mx, $from, $to, $subject, $mailid, $messageId, $replyto, $headerfrom, $delivered, $skip, $limit, $startDate, $endDate, $sort, $dir, $groupby);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HistoryApi->viewMailLog: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The numeric ID of the mail order to filter by.  When omitted, logs from the first active mail order are returned.  Obtain valid IDs from &#x60;GET /mail&#x60; or &#x60;GET /mail/{id}&#x60;. | [optional] |
| **origin** | **string**| Filter by the originating IP address from which the message was submitted to the relay.  Must be a valid IPv4 or IPv6 address. | [optional] |
| **mx** | **string**| Filter by the MX hostname the relay attempted delivery to.  For example &#x60;mx.google.com&#x60; would return messages destined for Gmail recipients. Maps to &#x60;mxHostname&#x60; in the &#x60;MailLogEntry&#x60; response. | [optional] |
| **from** | **string**| Filter by SMTP envelope &#x60;MAIL FROM&#x60; address (exact match).  This is the address the relay used for bounce handling and may differ from the &#x60;From:&#x60; message header.  For header-level filtering use &#x60;headerfrom&#x60;. | [optional] |
| **to** | **string**| Filter by SMTP envelope &#x60;RCPT TO&#x60; address (exact match).  This is the delivery address used by the relay and may differ from the &#x60;To:&#x60; header when BCC recipients are involved. | [optional] |
| **subject** | **string**| Filter by email &#x60;Subject&#x60; header (exact match).  To search for a substring, include it in the full subject text. | [optional] |
| **mailid** | **string**| Filter by the relay-assigned mail ID string (exact match).  This corresponds to the &#x60;id&#x60; field in &#x60;MailLogEntry&#x60; and to the &#x60;text&#x60; value returned by the sending endpoints on success.  Format is an 18–19 character hexadecimal string such as &#x60;185997065c60008840&#x60;. | [optional] |
| **messageId** | **string**| Filter by the &#x60;Message-ID&#x60; email header using a substring (case-insensitive) match. The &#x60;Message-ID&#x60; is assigned by the sending mail client and is visible in the &#x60;messageId&#x60; field of &#x60;MailLogEntry&#x60;.  Useful when you know the message ID generated by your application but not the relay &#x60;mailid&#x60;. | [optional] |
| **replyto** | **string**| Filter by the &#x60;Reply-To&#x60; message header address (exact match).  Only returns messages where this header was explicitly set. | [optional] |
| **headerfrom** | **string**| Filter by the &#x60;From&#x60; message header address (exact match).  This is the human-visible sender address and may differ from the SMTP envelope &#x60;from&#x60; parameter when sending on behalf of another address. | [optional] |
| **delivered** | **int**| Filter by delivery status.  &#x60;1&#x60; returns only messages that were successfully delivered to the destination MX.  &#x60;0&#x60; returns messages that are still queued, deferred, or failed.  Omit to return all messages regardless of delivery status. | [optional] |
| **skip** | **int**| Number of records to skip for pagination.  Use in combination with &#x60;limit&#x60; to page through large result sets.  Defaults to &#x60;0&#x60; (no skip). | [optional] [default to 0] |
| **limit** | **int**| Maximum number of records to return per page.  Defaults to &#x60;100&#x60;. Maximum allowed value is &#x60;10000&#x60;.  The response also includes a &#x60;total&#x60; field with the full matched count so you can calculate the number of pages. | [optional] [default to 100] |
| **startDate** | [**\Interserver\Mailbaby\Model\ViewMailLogStartDateParameter**](../Model/.md)| Earliest date to include.  Accepts either a Unix timestamp (integer seconds since epoch) or a date string parseable by &#x60;strtotime()&#x60; such as &#x60;2024-01-15&#x60; or &#x60;last monday&#x60;.  Messages with a &#x60;time&#x60; value **greater than or equal to** this value will be included. | [optional] |
| **endDate** | [**\Interserver\Mailbaby\Model\ViewMailLogStartDateParameter**](../Model/.md)| Latest date to include.  Accepts either a Unix timestamp (integer seconds since epoch) or a date string parseable by &#x60;strtotime()&#x60; such as &#x60;2024-01-31&#x60; or &#x60;yesterday&#x60;. Messages with a &#x60;time&#x60; value **less than or equal to** this value will be included. | [optional] |
| **sort** | **string**| Field to sort results by.  Currently only &#x60;time&#x60; is supported (sorts by internal row ID which corresponds to chronological order). | [optional] [default to &#39;time&#39;] |
| **dir** | **string**| Sort direction.  &#x60;desc&#x60; returns newest first (default), &#x60;asc&#x60; returns oldest first. | [optional] [default to &#39;desc&#39;] |
| **groupby** | **string**| Controls how results are grouped.  &#x60;recipient&#x60; (default) returns one row per delivery attempt — a message sent to 4 recipients produces 4 rows, each with its own &#x60;recipient&#x60;, &#x60;delivered&#x60;, &#x60;response&#x60;, and delivery metadata.  &#x60;message&#x60; collapses to one row per unique message ID; delivery-level fields will reflect one arbitrary recipient per message.  The &#x60;total&#x60; count in the response matches the grouping mode. | [optional] [default to &#39;recipient&#39;] |

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
