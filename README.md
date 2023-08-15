# MailBaby

**Send emails fast and with confidence through our easy to use [REST](https://en.wikipedia.org/wiki/Representational_state_transfer) API interface.**
# Overview
This is the API interface to the [Mail Baby](https//mail.baby/) Mail services provided by [InterServer](https://www.interserver.net). To use this service you must have an account with us at [my.interserver.net](https://my.interserver.net).
# Authentication
In order to use most of the API calls you must pass credentials from the [my.interserver.net](https://my.interserver.net/) site.
We support several different authentication methods but the preferred method is to use the **API Key** which you can get from the [Account Security](https://my.interserver.net/account_security) page.


For more information, please visit [https://www.mail.baby/contact/](https://www.mail.baby/contact/).

## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/interserver/mailbaby-client-php.git"
    }
  ],
  "require": {
    "interserver/mailbaby-client-php": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/MailBaby/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure API key authorization: apiKeyAuth
$config = Interserver\Mailbaby\Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Interserver\Mailbaby\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-KEY', 'Bearer');


$apiInstance = new Interserver\Mailbaby\Api\BlockingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$type = 'type_example'; // string | The type of deny rule.
$data = 'data_example'; // string | The content of the rule.  If a domain type rule then an example would be google.com. For a begins with type an example would be msgid-.  For the email typer an example would be user@server.com.
$user = 'user_example'; // string | Mail account username that will be tied to this rule.  If not specified the first active mail order will be used.

try {
    $result = $apiInstance->addRule($type, $data, $user);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlockingApi->addRule: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api.mailbaby.net*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*BlockingApi* | [**addRule**](docs/Api/BlockingApi.md#addrule) | **POST** /mail/rules | Creates a new email deny rule.
*BlockingApi* | [**deleteRule**](docs/Api/BlockingApi.md#deleterule) | **DELETE** /mail/rules/{ruleId} | Removes an deny mail rule.
*BlockingApi* | [**delistBlock**](docs/Api/BlockingApi.md#delistblock) | **POST** /mail/blocks/delete | Removes an email address from the blocked list
*BlockingApi* | [**getMailBlocks**](docs/Api/BlockingApi.md#getmailblocks) | **GET** /mail/blocks | displays a list of blocked email addresses
*BlockingApi* | [**getRules**](docs/Api/BlockingApi.md#getrules) | **GET** /mail/rules | Displays a listing of deny email rules.
*HistoryApi* | [**getStats**](docs/Api/HistoryApi.md#getstats) | **GET** /mail/stats | displays a list of blocked email addresses
*HistoryApi* | [**viewMailLog**](docs/Api/HistoryApi.md#viewmaillog) | **GET** /mail/log | displays the mail log
*SendingApi* | [**sendAdvMail**](docs/Api/SendingApi.md#sendadvmail) | **POST** /mail/advsend | Sends an Email with Advanced Options
*SendingApi* | [**sendMail**](docs/Api/SendingApi.md#sendmail) | **POST** /mail/send | Sends an Email
*ServicesApi* | [**getMailOrders**](docs/Api/ServicesApi.md#getmailorders) | **GET** /mail | displays a list of mail service orders
*StatusApi* | [**pingServer**](docs/Api/StatusApi.md#pingserver) | **GET** /ping | Checks if the server is running

## Models

- [DenyRuleNew](docs/Model/DenyRuleNew.md)
- [DenyRuleRecord](docs/Model/DenyRuleRecord.md)
- [DenyRuleRecordAllOf](docs/Model/DenyRuleRecordAllOf.md)
- [EmailAddress](docs/Model/EmailAddress.md)
- [GenericResponse](docs/Model/GenericResponse.md)
- [GetMailOrders401Response](docs/Model/GetMailOrders401Response.md)
- [GetStats200ResponseInner](docs/Model/GetStats200ResponseInner.md)
- [MailBlockClickHouse](docs/Model/MailBlockClickHouse.md)
- [MailBlockRspamd](docs/Model/MailBlockRspamd.md)
- [MailBlocks](docs/Model/MailBlocks.md)
- [MailLog](docs/Model/MailLog.md)
- [MailLogEntry](docs/Model/MailLogEntry.md)
- [MailOrder](docs/Model/MailOrder.md)
- [SendMail](docs/Model/SendMail.md)
- [SendMailAdv](docs/Model/SendMailAdv.md)

## Authorization

Authentication schemes defined for the API:
### apiKeyAuth

- **Type**: API key
- **API key parameter name**: X-API-KEY
- **Location**: HTTP header


## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author

support@interserver.net

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.1.0`
    - Package version: `1.0.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
