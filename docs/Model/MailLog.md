# MailLog

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**total** | **int** | Total number of log entries that match the supplied filters, regardless of &#x60;skip&#x60; and &#x60;limit&#x60;.  Use this to calculate the number of pages: &#x60;ceil(total / limit)&#x60;. |
**skip** | **int** | The &#x60;skip&#x60; value used for this page (echoed from the request). |
**limit** | **int** | The &#x60;limit&#x60; value used for this page (echoed from the request). |
**emails** | [**\Interserver\Mailbaby\Model\MailLogEntry[]**](MailLogEntry.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
