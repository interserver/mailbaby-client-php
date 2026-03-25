# SendMail

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**to** | [**\Interserver\Mailbaby\Model\SendMailTo**](SendMailTo.md) |  |
**from** | **string** | The sender address.  This is used as both the &#x60;From&#x60; header and the &#x60;Reply-To&#x60; header automatically.  Must be a valid email address authorized for your mail order. |
**subject** | **string** | The subject line of the email. |
**body** | **string** | The email body.  If the string contains any HTML tags the message is automatically sent as &#x60;text/html&#x60;; otherwise it is sent as &#x60;text/plain&#x60;. |
**id** | **int** | Optional numeric ID of the mail order to send through.  If omitted the first active order on your account is used automatically.  Valid IDs are returned by &#x60;GET /mail&#x60;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
