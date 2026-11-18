# Changelog

All notable changes to the Zoho CRM PHP SDK 8.0 (`zohocrm/php-sdk-8.0`) are documented in this file.

## [5.0.1]

### Compatibility

| Requirement | Supported |
|---|---|
| PHP | 7.1 or later (verified on PHP 8.5) |
| Extensions | `ext-json`, `ext-curl` |
| Zoho CRM API | v8 |

The minimum PHP version is unchanged (`>=7.1`). This release removes the deprecation warnings raised when the SDK is loaded on PHP 8.4 and later.

### Fixed

- **PHP 8.4: "Implicitly marking parameter as nullable is deprecated".**
  Parameters declared with a type and a `null` default (`Type $x = null`) are now explicitly nullable (`?Type $x = null`). This affects 177 parameters across 73 files, including:
  - `$paramInstance` (`ParameterMap`) and `$headerInstance` (`HeaderMap`) on all `*Operations` classes, such as `RecordOperations`, `ModulesOperations` and `UsersOperations`.
  - `$e` in `SDKLogger::severeError()`.
  - `$cause` in the `SDKException` constructor.
  - Optional `string` and `array` parameters, for example in `RequestProxy`.

- **PHP 8.5: "Non-canonical cast (double) is deprecated".**
  `(double)` casts are replaced with `(float)` in:
  - `OAuthToken::isAccessTokenExpired()`
  - `DataTypeConverter` (converter for `Double` fields)

### Behaviour

No functional changes.

- `?Type $x = null` has the same meaning as `Type $x = null`. Existing calls that omit these arguments or pass `null` work as before.
- `(float)` and `(double)` are the same cast in PHP, so token expiry checks and `Double` field conversion return identical values.
- No public classes, methods or parameters were added, removed or renamed.

### Upgrade

```sh
composer require zohocrm/php-sdk-8.0:5.0.1
```