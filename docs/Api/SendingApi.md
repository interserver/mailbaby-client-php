# Interserver\Mailbaby\SendingApi

Send email via simple, advanced, or raw RFC 822 message submission.

All URIs are relative to https://api.mailbaby.net, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**rawMail()**](SendingApi.md#rawMail) | **POST** /mail/rawsend | Sends a raw RFC 822 email |
| [**sendAdvMail()**](SendingApi.md#sendAdvMail) | **POST** /mail/advsend | Sends an Email with Advanced Options |
| [**sendMail()**](SendingApi.md#sendMail) | **POST** /mail/send | Sends an Email |


## `rawMail()`

```php
rawMail($sendMailRaw): \Interserver\Mailbaby\Model\GenericResponse
```

Sends a raw RFC 822 email

Accepts a complete, pre-built RFC 822 email message (headers + body) as a string and injects it into the relay without any modification.  This endpoint is particularly useful when the message has already been **DKIM-signed** — because the relay transmits the exact bytes you provide, the DKIM signature remains intact. If you use the other sending endpoints the relay may add or reorder headers, breaking an existing signature.  The `From` and recipient addresses are parsed automatically from the message headers (`From`, `To`, `Cc`, `Bcc`).  You do **not** need to specify them separately.  If an `id` is provided it must correspond to an active mail order on your account. If omitted, the first active order is selected automatically.  The SMTP credentials for the selected order are used to authenticate with the relay.  On success the response `text` field contains the relay transaction ID.  This ID can be used with `GET /mail/log` (via the `mailid` query parameter) to look up the delivery record.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKeyAuth
$config = Interserver\Mailbaby\Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Interserver\Mailbaby\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-KEY', 'Bearer');


$apiInstance = new Interserver\Mailbaby\Api\SendingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$sendMailRaw = new \Interserver\Mailbaby\Model\SendMailRaw(); // \Interserver\Mailbaby\Model\SendMailRaw

try {
    $result = $apiInstance->rawMail($sendMailRaw);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SendingApi->rawMail: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sendMailRaw** | [**\Interserver\Mailbaby\Model\SendMailRaw**](../Model/SendMailRaw.md)|  | |

### Return type

[**\Interserver\Mailbaby\Model\GenericResponse**](../Model/GenericResponse.md)

### Authorization

[apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`, `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendAdvMail()`

```php
sendAdvMail($subject, $body, $from, $to, $replyto, $cc, $bcc, $attachments, $id): \Interserver\Mailbaby\Model\GenericResponse
```

Sends an Email with Advanced Options

Sends an email through one of your mail orders with full control over recipients, headers, and attachments.  Supports multiple To / CC / BCC addresses, named contacts, Reply-To overrides, and base64-encoded file attachments.  **Content-type flexibility** — the request body may be submitted as either `application/x-www-form-urlencoded` or `application/json`.  When using form encoding, address fields (`from`, `to`, `replyto`, `cc`, `bcc`) accept both a plain RFC 822 comma-separated string (e.g. `\"Joe <joe@example.com>, jane@example.com\"`) and the structured `[{\"email\":\"...\",\"name\":\"...\"}]` array format.  When using JSON, both formats are equally supported.  **HTML detection** is automatic — if `body` contains HTML tags the `Content-Type` is set to `text/html`; otherwise `text/plain`.  **Attachments** must be base64-encoded.  Each attachment requires at least a `data` field; the optional `filename` field controls the attachment name shown to recipients.  If an `id` is provided it must correspond to an active mail order on your account. If omitted, the first active order is selected automatically.  On success the response `text` field contains the relay transaction ID which can be looked up in `GET /mail/log` via the `mailid` query parameter.  ## Examples  ### Form — basic string addresses ```sh curl -X POST https://api.mailbaby.net/mail/advsend \\   -H 'X-API-KEY: YOUR_API_KEY' \\   -H 'Content-Type: application/x-www-form-urlencoded' \\   -d 'subject=Welcome' \\   -d 'body=Hello' \\   -d from=user@domain.com \\   -d to=support@interserver.net ``` ### Form — RFC 822 named addresses ```sh curl -X POST https://api.mailbaby.net/mail/advsend \\   -H 'X-API-KEY: YOUR_API_KEY' \\   -H 'Content-Type: application/x-www-form-urlencoded' \\   -d 'subject=Welcome' \\   -d 'body=Hello' \\   -d 'from=Joe <user@domain.com>' \\   -d 'to=Jane <support@interserver.net>' ``` ### Form — multiple recipients as array ```sh curl -X POST https://api.mailbaby.net/mail/advsend \\   -H 'X-API-KEY: YOUR_API_KEY' \\   -H 'Content-Type: application/x-www-form-urlencoded' \\   -d 'subject=Welcome' -d 'body=Hello' \\   -d from=user@domain.com \\   -d 'to[0][name]=Joe' -d 'to[0][email]=support@interserver.net' \\   -d 'to[1][name]=Jane' -d 'to[1][email]=jane@interserver.net' ``` ### JSON — structured objects ```sh curl -X POST https://api.mailbaby.net/mail/advsend \\   -H 'X-API-KEY: YOUR_API_KEY' \\   -H 'Content-Type: application/json' \\   -d '{     \"subject\": \"Welcome\",     \"body\": \"<h1>Hello</h1>\",     \"from\": {\"email\": \"user@domain.com\", \"name\": \"Sender Name\"},     \"to\": [{\"email\": \"joe@client.com\", \"name\": \"Joe Client\"}],     \"cc\": [{\"email\": \"manager@client.com\"}],     \"attachments\": [{\"filename\": \"report.pdf\", \"data\": \"BASE64_DATA\"}]   }' ```

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKeyAuth
$config = Interserver\Mailbaby\Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Interserver\Mailbaby\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-KEY', 'Bearer');


$apiInstance = new Interserver\Mailbaby\Api\SendingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$subject = 'subject_example'; // string | The subject line of the email.
$body = 'body_example'; // string | The email body.  If the string contains any HTML tags the message is automatically sent as `text/html`; otherwise it is sent as `text/plain`.
$from = new \Interserver\Mailbaby\Model\EmailAddressTypes(); // \Interserver\Mailbaby\Model\EmailAddressTypes | The sender address.  Accepts a plain email string, an RFC 822 named string (`\\\"Name <email>\\\"`), or a `{\\\"email\\\": \\\"...\\\", \\\"name\\\": \\\"...\\\"}` object.
$to = new \Interserver\Mailbaby\Model\EmailAddressesTypes(); // \Interserver\Mailbaby\Model\EmailAddressesTypes | One or more destination addresses.  Accepts a comma-separated RFC 822 string or an array of contact objects.
$replyto = new \Interserver\Mailbaby\Model\EmailAddressesTypes(); // \Interserver\Mailbaby\Model\EmailAddressesTypes | Optional.  One or more addresses to set as the `Reply-To` header. When recipients reply to the message their email client will address the reply to these addresses instead of `from`.
$cc = new \Interserver\Mailbaby\Model\EmailAddressesTypes(); // \Interserver\Mailbaby\Model\EmailAddressesTypes | Optional.  Carbon-copy recipients.  These addresses are listed in the `Cc` header and are visible to all recipients.
$bcc = new \Interserver\Mailbaby\Model\EmailAddressesTypes(); // \Interserver\Mailbaby\Model\EmailAddressesTypes | Optional.  Blind-carbon-copy recipients.  These addresses receive the message but are not listed in any visible header.
$attachments = array(new \Interserver\Mailbaby\Model\\Interserver\Mailbaby\Model\MailAttachment()); // \Interserver\Mailbaby\Model\MailAttachment[] | Optional list of file attachments.  Each file must be base64-encoded. Include `filename` so recipients see a meaningful attachment name.
$id = 56; // int | Optional numeric ID of the mail order to send through.  If omitted the first active order on your account is used automatically.  Valid IDs are returned by `GET /mail`.

try {
    $result = $apiInstance->sendAdvMail($subject, $body, $from, $to, $replyto, $cc, $bcc, $attachments, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SendingApi->sendAdvMail: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **subject** | **string**| The subject line of the email. | |
| **body** | **string**| The email body.  If the string contains any HTML tags the message is automatically sent as &#x60;text/html&#x60;; otherwise it is sent as &#x60;text/plain&#x60;. | |
| **from** | [**\Interserver\Mailbaby\Model\EmailAddressTypes**](../Model/EmailAddressTypes.md)| The sender address.  Accepts a plain email string, an RFC 822 named string (&#x60;\\\&quot;Name &lt;email&gt;\\\&quot;&#x60;), or a &#x60;{\\\&quot;email\\\&quot;: \\\&quot;...\\\&quot;, \\\&quot;name\\\&quot;: \\\&quot;...\\\&quot;}&#x60; object. | |
| **to** | [**\Interserver\Mailbaby\Model\EmailAddressesTypes**](../Model/EmailAddressesTypes.md)| One or more destination addresses.  Accepts a comma-separated RFC 822 string or an array of contact objects. | |
| **replyto** | [**\Interserver\Mailbaby\Model\EmailAddressesTypes**](../Model/EmailAddressesTypes.md)| Optional.  One or more addresses to set as the &#x60;Reply-To&#x60; header. When recipients reply to the message their email client will address the reply to these addresses instead of &#x60;from&#x60;. | [optional] |
| **cc** | [**\Interserver\Mailbaby\Model\EmailAddressesTypes**](../Model/EmailAddressesTypes.md)| Optional.  Carbon-copy recipients.  These addresses are listed in the &#x60;Cc&#x60; header and are visible to all recipients. | [optional] |
| **bcc** | [**\Interserver\Mailbaby\Model\EmailAddressesTypes**](../Model/EmailAddressesTypes.md)| Optional.  Blind-carbon-copy recipients.  These addresses receive the message but are not listed in any visible header. | [optional] |
| **attachments** | [**\Interserver\Mailbaby\Model\MailAttachment[]**](../Model/\Interserver\Mailbaby\Model\MailAttachment.md)| Optional list of file attachments.  Each file must be base64-encoded. Include &#x60;filename&#x60; so recipients see a meaningful attachment name. | [optional] |
| **id** | **int**| Optional numeric ID of the mail order to send through.  If omitted the first active order on your account is used automatically.  Valid IDs are returned by &#x60;GET /mail&#x60;. | [optional] |

### Return type

[**\Interserver\Mailbaby\Model\GenericResponse**](../Model/GenericResponse.md)

### Authorization

[apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`, `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendMail()`

```php
sendMail($to, $from, $subject, $body, $id): \Interserver\Mailbaby\Model\GenericResponse
```

Sends an Email

Sends an email through one of your mail orders using a simple flat set of fields. This is the quickest way to send a single-recipient plain-text or HTML message.  **HTML detection** is automatic — if the `body` value contains any HTML tags the message will be sent as `text/html`; otherwise it is sent as `text/plain`.  The `from` address is also automatically set as the `Reply-To` header.  *Note*: If you need to send to multiple recipients, add CC/BCC, or include file attachments, use `POST /mail/advsend` instead.  If you have a pre-built RFC 822 message (e.g. already DKIM-signed), use `POST /mail/rawsend`.  On success the response `text` field contains the relay transaction ID.  This ID can be used with `GET /mail/log` (via the `mailid` query parameter) to look up the delivery record.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKeyAuth
$config = Interserver\Mailbaby\Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Interserver\Mailbaby\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-KEY', 'Bearer');


$apiInstance = new Interserver\Mailbaby\Api\SendingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$to = new \Interserver\Mailbaby\Model\SendMailTo(); // \Interserver\Mailbaby\Model\SendMailTo
$from = 'from_example'; // string | The sender address.  This is used as both the `From` header and the `Reply-To` header automatically.  Must be a valid email address authorized for your mail order.
$subject = 'subject_example'; // string | The subject line of the email.
$body = 'body_example'; // string | The email body.  If the string contains any HTML tags the message is automatically sent as `text/html`; otherwise it is sent as `text/plain`.
$id = 56; // int | Optional numeric ID of the mail order to send through.  If omitted the first active order on your account is used automatically.  Valid IDs are returned by `GET /mail`.

try {
    $result = $apiInstance->sendMail($to, $from, $subject, $body, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SendingApi->sendMail: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **to** | [**\Interserver\Mailbaby\Model\SendMailTo**](../Model/SendMailTo.md)|  | |
| **from** | **string**| The sender address.  This is used as both the &#x60;From&#x60; header and the &#x60;Reply-To&#x60; header automatically.  Must be a valid email address authorized for your mail order. | |
| **subject** | **string**| The subject line of the email. | |
| **body** | **string**| The email body.  If the string contains any HTML tags the message is automatically sent as &#x60;text/html&#x60;; otherwise it is sent as &#x60;text/plain&#x60;. | |
| **id** | **int**| Optional numeric ID of the mail order to send through.  If omitted the first active order on your account is used automatically.  Valid IDs are returned by &#x60;GET /mail&#x60;. | [optional] |

### Return type

[**\Interserver\Mailbaby\Model\GenericResponse**](../Model/GenericResponse.md)

### Authorization

[apiKeyAuth](../../README.md#apiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`, `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
