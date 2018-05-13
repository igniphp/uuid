# ![Igni logo](https://github.com/igniphp/common/blob/master/logo/full.svg)
[![Build Status](https://travis-ci.org/igniphp/uuid.svg?branch=master)](https://travis-ci.org/igniphp/uuid)

## Igni\Util\Uuid

RFC-compliant Universally Unique Identifiers v5 generator.

## Installation
```
composer require igniphp/uuid
```

### API

#### `generate(): string`
Generates uuid.

#### `generateShort(): string`
Generates shorter representation of uuid (base58 encoded).

#### `toShort(string $string): string`
Shorts uuid by packing it into base58 representation.

#### `fromShort(string $string): string`
Returns full uuid as a string from base58 representation.

#### `validate(string $string): bool`
Validates if passed string is valid uuid number.
