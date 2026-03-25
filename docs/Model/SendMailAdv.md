# SendMailAdv

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**subject** | **string** | The subject line of the email. |
**body** | **string** | The email body.  If the string contains any HTML tags the message is automatically sent as &#x60;text/html&#x60;; otherwise it is sent as &#x60;text/plain&#x60;. |
**from** | [**\Interserver\Mailbaby\Model\EmailAddressTypes**](EmailAddressTypes.md) |  |
**to** | [**\Interserver\Mailbaby\Model\EmailAddressesTypes**](EmailAddressesTypes.md) |  |
**replyto** | [**\Interserver\Mailbaby\Model\EmailAddressesTypes**](EmailAddressesTypes.md) |  | [optional]
**cc** | [**\Interserver\Mailbaby\Model\EmailAddressesTypes**](EmailAddressesTypes.md) |  | [optional]
**bcc** | [**\Interserver\Mailbaby\Model\EmailAddressesTypes**](EmailAddressesTypes.md) |  | [optional]
**attachments** | [**\Interserver\Mailbaby\Model\MailAttachment[]**](MailAttachment.md) | Optional list of file attachments.  Each file must be base64-encoded. Include &#x60;filename&#x60; so recipients see a meaningful attachment name. | [optional]
**id** | **int** | Optional numeric ID of the mail order to send through.  If omitted the first active order on your account is used automatically.  Valid IDs are returned by &#x60;GET /mail&#x60;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
