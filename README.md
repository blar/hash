[![Build Status](https://travis-ci.org/blar/hash.svg?branch=master)](https://travis-ci.org/blar/hash)
[![Coverage Status](https://coveralls.io/repos/blar/hash/badge.svg?branch=master)](https://coveralls.io/r/blar/hash?branch=master)
[![Dependency Status](https://gemnasium.com/blar/hash.svg)](https://gemnasium.com/blar/hash)

# Hash

## Beispiele

### MD5

    $hash = new Hash('MD5');
    $hash->push('foobar');
    echo $hash;

### SHA-1

    $hash = new Hash('SHA1');
    $hash->push('foobar');
    echo $hash;

### SHA-1 mit HMAC

    $hash = new HmacHash('SHA1', '1337');
    $hash->push('foobar');
    echo $hash;

### SHA-1 mit HMAC und mehreren Teilen

    $hash = new HmacHash('SHA1', '1337');
    $hash->push('foo');
    $hash->push('bar');
    echo $hash;
