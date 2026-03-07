# # SendMailAdv

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**subject** | **string** | The subject or title of the email |
**body** | **string** | The main email contents. |
**from** | [**\Interserver\Mailbaby\Model\EmailAddressTypes**](EmailAddressTypes.md) |  |
**to** | [**\Interserver\Mailbaby\Model\EmailAddressesTypes**](EmailAddressesTypes.md) |  |
**replyto** | [**\Interserver\Mailbaby\Model\EmailAddressesTypes**](EmailAddressesTypes.md) |  | [optional]
**cc** | [**\Interserver\Mailbaby\Model\EmailAddressesTypes**](EmailAddressesTypes.md) |  | [optional]
**bcc** | [**\Interserver\Mailbaby\Model\EmailAddressesTypes**](EmailAddressesTypes.md) |  | [optional]
**attachments** | [**\Interserver\Mailbaby\Model\MailAttachment[]**](MailAttachment.md) | (optional) File attachments to include in the email.  The file contents must be base64 encoded! | [optional]
**id** | **int** | (optional)  ID of the Mail order within our system to use as the Mail Account. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
