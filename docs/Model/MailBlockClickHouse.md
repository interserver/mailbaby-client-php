# MailBlockClickHouse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**date** | **\DateTime** | The date the block event was recorded. |
**from** | **string** | The SMTP envelope sender (&#x60;MAIL FROM&#x60;) address of the blocked message. Pass this value as &#x60;email&#x60; to &#x60;POST /mail/blocks/delete&#x60; to delist it. |
**subject** | **string** | The &#x60;Subject&#x60; header of the blocked message. |
**to** | **string** | The serialized list of recipients of the blocked message. |
**messageId** | **string** | The &#x60;Message-ID&#x60; header of the blocked message, or &#x60;null&#x60; if not present. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
