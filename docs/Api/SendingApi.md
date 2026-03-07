# Interserver\Mailbaby\SendingApi

Email delivery commands

All URIs are relative to https://api.mailbaby.net, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**rawMail()**](SendingApi.md#rawMail) | **POST** /mail/rawsend | Sends a raw email |
| [**sendAdvMail()**](SendingApi.md#sendAdvMail) | **POST** /mail/advsend | Sends an Email with Advanced Options |
| [**sendMail()**](SendingApi.md#sendMail) | **POST** /mail/send | Sends an Email |


## `rawMail()`

```php
rawMail($sendMailRaw): \Interserver\Mailbaby\Model\GenericResponse
```

Sends a raw email

This call will let you pass the raw / complete email contents (including headers) as a string and have it get sent as-is.  This is useful for things like DKIM signed messages.

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

Sends An email through one of your mail orders allowing additional options such as file attachments, cc, bcc, etc.  Here are 9 examples showing the various ways to call the advsend operation showing the different ways you can pass the to, cc, bcc, and replyto information. The first several examples are all for the application/x-www-form-urlencoded content-type while the later ones are for application/json content-types.  ```BasicForm curl -i --request POST --url https://api.mailbaby.net/mail/advsend \\ --header 'Accept: application/json' \\ --header 'Content-Type: application/x-www-form-urlencoded' \\ --header 'X-API-KEY: YOUR_API_KEY' \\ --data 'subject=Welcome' \\ --data 'body=Hello' \\ --data from=user@domain.com \\ --data to=support@interserver.net ```  ```ArrayForm curl -i --request POST --url https://api.mailbaby.net/mail/advsend \\ --header 'Accept: application/json' \\ --header 'Content-Type: application/x-www-form-urlencoded' \\ --header 'X-API-KEY: YOUR_API_KEY' \\ --data 'subject=Welcome' \\ --data 'body=Hello' \\ --data from=user@domain.com \\ --data \"to[0][name]=Joe\" \\ --data \"to[0][email]=support@interserver.net\" ```  ```NameEmailForm curl -i --request POST --url https://api.mailbaby.net/mail/advsend \\ --header 'Accept: application/json' \\ --header 'Content-Type: application/x-www-form-urlencoded' \\ --header 'X-API-KEY: YOUR_API_KEY' \\ --data 'subject=Welcome' \\ --data 'body=Hello' \\ --data from=\"Joe <user@domain.com>\" \\ --data to=\"Joe <support@interserver.net>\" ```  ```MultToForm curl -i --request POST --url https://api.mailbaby.net/mail/advsend \\ --header 'Accept: application/json' \\ --header 'Content-Type: application/x-www-form-urlencoded' \\ --header 'X-API-KEY: YOUR_API_KEY' \\ --data 'subject=Welcome' \\ --data 'body=Hello' \\ --data from=user@domain.com \\ --data \"to=support@interserver.net, support@interserver.net\" ```  ```MultToFullForm curl -i --request POST --url https://api.mailbaby.net/mail/advsend \\ --header 'Accept: application/json' \\ --header 'Content-Type: application/x-www-form-urlencoded' \\ --header 'X-API-KEY: YOUR_API_KEY' \\ --data 'subject=Welcome' \\ --data 'body=Hello' \\ --data from=user@domain.com \\ --data \"to=Joe <support@interserver.net>, Joe <support@interserver.net>\" ```  ```MultToArrayForm curl -i --request POST --url https://api.mailbaby.net/mail/advsend \\ --header 'Accept: application/json' \\ --header 'Content-Type: application/x-www-form-urlencoded' \\ --header 'X-API-KEY: YOUR_API_KEY' \\ --data 'subject=Welcome' \\ --data 'body=Hello' \\ --data from=user@domain.com \\ --data \"to[0][name]=Joe\" \\ --data \"to[0][email]=support@interserver.net\" \\ --data \"to[1][name]=Joe\" \\ --data \"to[1][email]=support@interserver.net\" ```  ```BasicJson curl -i --request POST --url https://api.mailbaby.net/mail/advsend \\ --header 'Accept: application/json' \\ --header 'Content-Type: application/json' \\ --header 'X-API-KEY: YOUR_API_KEY' \\ --data '{ \"subject\": \"Welcome\", \"body\": \"Hello\", \"from\": \"user@domain.com\", \"to\": \"support@interserver.net\" }' ```  ```ArrayJson curl -i --request POST --url https://api.mailbaby.net/mail/advsend \\ --header 'Accept: application/json' \\ --header 'Content-Type: application/json' \\ --header 'X-API-KEY: YOUR_API_KEY' \\ --data '{ \"subject\": \"Welcome\", \"body\": \"Hello\", \"from\": {\"name\": \"Joe\", \"email\": \"user@domain.com\"}, \"to\": [{\"name\": \"Joe\", \"email\": \"support@interserver.net\"}] }' ```  ```NameEmailJson curl -i --request POST --url https://api.mailbaby.net/mail/advsend \\ --header 'Accept: application/json' \\ --header 'Content-Type: application/json' \\ --header 'X-API-KEY: YOUR_API_KEY' \\ --data '{ \"subject\": \"Welcome\", \"body\": \"Hello\", \"from\": \"Joe <user@domain.com>\", \"to\": \"Joe <support@interserver.net>\" }' ```

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
$from = new \Interserver\Mailbaby\Model\EmailAddressTypes(); // \Interserver\Mailbaby\Model\EmailAddressTypes
$to = new \Interserver\Mailbaby\Model\EmailAddressesTypes(); // \Interserver\Mailbaby\Model\EmailAddressesTypes
$replyto = new \Interserver\Mailbaby\Model\EmailAddressesTypes(); // \Interserver\Mailbaby\Model\EmailAddressesTypes
$cc = new \Interserver\Mailbaby\Model\EmailAddressesTypes(); // \Interserver\Mailbaby\Model\EmailAddressesTypes
$bcc = new \Interserver\Mailbaby\Model\EmailAddressesTypes(); // \Interserver\Mailbaby\Model\EmailAddressesTypes
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
| **from** | [**\Interserver\Mailbaby\Model\EmailAddressTypes**](../Model/EmailAddressTypes.md)|  | |
| **to** | [**\Interserver\Mailbaby\Model\EmailAddressesTypes**](../Model/EmailAddressesTypes.md)|  | |
| **replyto** | [**\Interserver\Mailbaby\Model\EmailAddressesTypes**](../Model/EmailAddressesTypes.md)|  | [optional] |
| **cc** | [**\Interserver\Mailbaby\Model\EmailAddressesTypes**](../Model/EmailAddressesTypes.md)|  | [optional] |
| **bcc** | [**\Interserver\Mailbaby\Model\EmailAddressesTypes**](../Model/EmailAddressesTypes.md)|  | [optional] |
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
sendMail($to, $from, $subject, $body, $id): \Interserver\Mailbaby\Model\GenericResponse
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
$id = 56; // int | Optional Order ID

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
| **to** | **string**| The Contact whom is the primary recipient of this email. | |
| **from** | **string**| The contact whom is the this email is from. | |
| **subject** | **string**| The subject or title of the email | |
| **body** | **string**| The main email contents. | |
| **id** | **int**| Optional Order ID | [optional] |

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
