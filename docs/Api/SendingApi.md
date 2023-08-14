# Interserver\Mailbaby\SendingApi

All URIs are relative to https://api.mailbaby.net, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**sendAdvMail()**](SendingApi.md#sendAdvMail) | **POST** /mail/advsend | Sends an Email with Advanced Options |
| [**sendMail()**](SendingApi.md#sendMail) | **POST** /mail/send | Sends an Email |


## `sendAdvMail()`

```php
sendAdvMail($subject, $body, $from, $to, $replyto, $cc, $bcc, $attachments, $id): \Interserver\Mailbaby\Model\GenericResponse
```

Sends an Email with Advanced Options

Sends An email through one of your mail orders allowing additional options such as file attachments, cc, bcc, etc.

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
$subject = 'subject_example'; // string | The subject or title of the email
$body = 'body_example'; // string | The main email contents.
$from = new \Interserver\Mailbaby\Model\EmailAddressName(); // \Interserver\Mailbaby\Model\EmailAddressName
$to = array(new \Interserver\Mailbaby\Model\\Interserver\Mailbaby\Model\EmailAddressName()); // \Interserver\Mailbaby\Model\EmailAddressName[] | A list of destionation email addresses to send this to
$replyto = array(new \Interserver\Mailbaby\Model\\Interserver\Mailbaby\Model\EmailAddressName()); // \Interserver\Mailbaby\Model\EmailAddressName[] | (optional) A list of email addresses that specify where replies to the email should be sent instead of the _from_ address.
$cc = array(new \Interserver\Mailbaby\Model\\Interserver\Mailbaby\Model\EmailAddressName()); // \Interserver\Mailbaby\Model\EmailAddressName[] | (optional) A list of email addresses to carbon copy this message to.  They are listed on the email and anyone getting the email can see this full list of Contacts who received the email as well.
$bcc = array(new \Interserver\Mailbaby\Model\\Interserver\Mailbaby\Model\EmailAddressName()); // \Interserver\Mailbaby\Model\EmailAddressName[] | (optional) list of email addresses that should receive copies of the email.  They are hidden on the email and anyone gettitng the email would not see the other people getting the email in this list.
$attachments = array(new \Interserver\Mailbaby\Model\\Interserver\Mailbaby\Model\MailAttachment()); // \Interserver\Mailbaby\Model\MailAttachment[] | (optional) File attachments to include in the email.  The file contents must be base64 encoded!
$id = 56; // int | (optional)  ID of the Mail order within our system to use as the Mail Account.

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
| **subject** | **string**| The subject or title of the email | |
| **body** | **string**| The main email contents. | |
| **from** | [**\Interserver\Mailbaby\Model\EmailAddressName**](../Model/EmailAddressName.md)|  | |
| **to** | [**\Interserver\Mailbaby\Model\EmailAddressName[]**](../Model/\Interserver\Mailbaby\Model\EmailAddressName.md)| A list of destionation email addresses to send this to | |
| **replyto** | [**\Interserver\Mailbaby\Model\EmailAddressName[]**](../Model/\Interserver\Mailbaby\Model\EmailAddressName.md)| (optional) A list of email addresses that specify where replies to the email should be sent instead of the _from_ address. | [optional] |
| **cc** | [**\Interserver\Mailbaby\Model\EmailAddressName[]**](../Model/\Interserver\Mailbaby\Model\EmailAddressName.md)| (optional) A list of email addresses to carbon copy this message to.  They are listed on the email and anyone getting the email can see this full list of Contacts who received the email as well. | [optional] |
| **bcc** | [**\Interserver\Mailbaby\Model\EmailAddressName[]**](../Model/\Interserver\Mailbaby\Model\EmailAddressName.md)| (optional) list of email addresses that should receive copies of the email.  They are hidden on the email and anyone gettitng the email would not see the other people getting the email in this list. | [optional] |
| **attachments** | [**\Interserver\Mailbaby\Model\MailAttachment[]**](../Model/\Interserver\Mailbaby\Model\MailAttachment.md)| (optional) File attachments to include in the email.  The file contents must be base64 encoded! | [optional] |
| **id** | **int**| (optional)  ID of the Mail order within our system to use as the Mail Account. | [optional] |

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
sendMail($to, $from, $subject, $body): \Interserver\Mailbaby\Model\GenericResponse
```

Sends an Email

Sends an email through one of your mail orders.  *Note*: If you want to send to multiple recipients or use file attachments use the advsend (Advanced Send) call instead.

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
$to = 'to_example'; // string | The Contact whom is the primary recipient of this email.
$from = 'from_example'; // string | The contact whom is the this email is from.
$subject = 'subject_example'; // string | The subject or title of the email
$body = 'body_example'; // string | The main email contents.

try {
    $result = $apiInstance->sendMail($to, $from, $subject, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SendingApi->sendMail: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **to** | **string**| The Contact whom is the primary recipient of this email. | |
| **from** | **string**| The contact whom is the this email is from. | |
| **subject** | **string**| The subject or title of the email | |
| **body** | **string**| The main email contents. | |

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
