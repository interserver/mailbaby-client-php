# SendMailRaw

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**rawEmail** | **string** | The complete RFC 822 email message including all headers and the body. Must include at minimum &#x60;From&#x60;, &#x60;To&#x60;, &#x60;Subject&#x60;, &#x60;Date&#x60;, and &#x60;MIME-Version&#x60; headers.  DKIM signatures in the &#x60;DKIM-Signature&#x60; header are transmitted verbatim and will pass verification at the destination. |
**id** | **int** | Optional numeric ID of the mail order to use for SMTP authentication. If omitted the first active order on your account is used.  Valid IDs are returned by &#x60;GET /mail&#x60;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
