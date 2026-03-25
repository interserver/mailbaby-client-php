# MailOrderDetail

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The unique numeric ID of the mail order.  Used as the &#x60;id&#x60; parameter on sending calls, log queries, and stats queries. |
**status** | **string** | The current order status.  Only &#x60;active&#x60; orders can be used for sending. &#x60;canceled&#x60; orders are retained for history but cannot send. |
**username** | **string** | The SMTP AUTH username for this order, always in the format &#x60;mb&lt;id&gt;&#x60;. Use together with the password from &#x60;GET /mail/{id}&#x60; to authenticate directly against &#x60;relay.mailbaby.net:25&#x60; if needed. |
**password** | **string** | The current SMTP AUTH password for this mail order.  Use with the &#x60;username&#x60; field to authenticate against &#x60;relay.mailbaby.net:25&#x60;. |
**comment** | **string** | Optional human-readable note associated with the order. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
