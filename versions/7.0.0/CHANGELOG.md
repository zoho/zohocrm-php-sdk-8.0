# Changelog

All notable changes to the Zoho CRM PHP SDK 8.0 (`zohocrm/php-sdk-8.0`) are documented in this file.

## [7.0.0]

### Breaking changes

The per-user configuration cache in `Initializer` has been removed. The following public members no longer exist:

| Removed | Replacement |
|---|---|
| `Initializer::$LOCAL` | None. `Initializer::getInitializer()` returns the most recently initialized or switched user. |
| `Initializer::removeUserConfiguration($token)` | None. Call `Initializer::switchUser()` to change the active user. |
| `Initializer::getEncodedKey()` | None. |
| `Constants::USER_NOT_FOUND_ERROR` | None. |
| `Constants::USER_NOT_FOUND_ERROR_MESSAGE` | None. |

### Fixed

- **`Initializer::switchUser()` generated the token in the previous user's environment.**
  The new user is now made active before `generateToken()` runs, so `OAuthToken::getToken()` uses the new user's API domain and accounts URL.
- **`Initializer::getInitializer()` could only ever return the active user.**
  The removed `$LOCAL` lookup built its key from the active user, so it never selected anyone else. The method now returns the active user directly.
- **`Initializer::toString()` reported the active user's environment** instead of the environment of the instance it was called on.
- **`Utility::getEncodedFileName()`** (module fields cache file):
  - Throws an `SDKException` if the SDK is not initialized or has no environment, instead of a PHP error.
  - Replaces `/` with `_` in the base64 file name, so the name can no longer be treated as a sub-directory.
  - Uses a SHA-256 hash when the name would be longer than 250 characters, keeping it within the common 255-byte file name limit.
  - Refresh or access tokens of 32 characters or fewer previously produced an empty key, so all such users in the same data center shared one cache file. They now get a separate file.
  - Creating the `resources` directory no longer fails when two processes create it at the same time. An `SDKException` is thrown if it cannot be created.

### Behaviour

- Users whose refresh or access token is 32 characters or fewer get a new cache file name after upgrading. Their module field details are fetched again once. All other cache file names are unchanged.

### Upgrade

```sh
composer require zohocrm/php-sdk-8.0:7.0.0
```

Remove any calls to `Initializer::removeUserConfiguration()` and `Initializer::getEncodedKey()`, and any references to `Initializer::$LOCAL` or `Constants::USER_NOT_FOUND_ERROR*`.

## [6.0.0]

### Security

- Apply `DBStore` TLS settings before connecting to MySQL. Setting any TLS builder option now requires an encrypted connection with server certificate verification; connection, verification or encryption failures abort before any OAuth token query. Configurations without TLS options retain their existing behavior.

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
composer require zohocrm/php-sdk-8.0:6.0.0
```

## [5.0.0]

- Added new APIs and issue fixes.
