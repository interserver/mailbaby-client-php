# MailBlocks

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**local** | [**\Interserver\Mailbaby\Model\MailBlockClickHouse[]**](MailBlockClickHouse.md) | Messages flagged by the &#x60;LOCAL_BL_RCPT&#x60; rspamd rule in the last 5 days. These are messages sent to recipients on a local block list. |
**mbtrap** | [**\Interserver\Mailbaby\Model\MailBlockClickHouse[]**](MailBlockClickHouse.md) | Messages flagged by the &#x60;MBTRAP&#x60; rspamd rule in the last 5 days. These triggered MailBaby&#39;s honeypot / trap address detection. |
**subject** | [**\Interserver\Mailbaby\Model\MailBlockRspamd[]**](MailBlockRspamd.md) | Senders whose messages contained spam-indicative subjects (containing &#x60;@&#x60;, &#x60;smtp&#x60;, &#x60;socks4&#x60;, or &#x60;socks5&#x60;) with more than 4 occurrences of the same subject in the last 3 days. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
