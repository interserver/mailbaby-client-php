# GenericResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**status** | **string** | Always &#x60;\&quot;ok\&quot;&#x60; on success. | [optional]
**text** | **string** | Operation-specific result string.  For send operations this is the relay transaction ID (e.g. &#x60;185caa69ff7000f47c&#x60;) which can be used as the &#x60;mailid&#x60; parameter in &#x60;GET /mail/log&#x60;.  For create operations this is the new record&#39;s numeric ID.  For delete operations this is a human-readable confirmation. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
