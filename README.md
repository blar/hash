[![License](https://poser.pugx.org/blar/hash/license)](https://packagist.org/packages/blar/hash)
[![Latest Stable Version](https://poser.pugx.org/blar/hash/v/stable)](https://packagist.org/packages/blar/hash)
[![Build Status](https://travis-ci.org/blar/hash.svg?branch=master)](https://travis-ci.org/blar/hash)
[![Coverage Status](https://coveralls.io/repos/blar/hash/badge.svg?branch=master)](https://coveralls.io/r/blar/hash?branch=master)
[![Dependency Status](https://gemnasium.com/blar/hash.svg)](https://gemnasium.com/blar/hash)

# Hash

## Beispiele

### MD5

    $hash = new Hash('MD5');
    $hash->push('foobar');
    echo $hash;

### MD5 von einer Datei

    $hash = new Hash('MD5');
    $hash->pushFile('foobar.txt');
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

### Unterstützte Hash-Algorithmen abrufen

    echo implode(', ', Hash::getAlgos());

Je nach PHP-Version und Betriebsystem können andere Hash-Algorithmen verfügbar sein. Hier eine beispielhafte Ausgabe:

    md2, md4, md5, sha1, sha224, sha256, sha384, sha512, ripemd128,
    ripemd160, ripemd256, ripemd320, whirlpool, tiger128,3, tiger160,3,
    tiger192,3, tiger128,4, tiger160,4, tiger192,4, snefru, snefru256,
    gost, gost-crypto, adler32, crc32, crc32b, fnv132, fnv1a32, fnv164,
    fnv1a64, joaat, haval128,3, haval160,3, haval192,3, haval224,3,
    haval256,3, haval128,4, haval160,4, haval192,4, haval224,4,
    haval256,4, haval128,5, haval160,5, haval192,5, haval224,5,
    haval256,5


## Installation

### Abhängigkeiten

[Abhängigkeiten von blar/hash auf gemnasium anzeigen](https://gemnasium.com/blar/hash)

### Installation per Composer

    $ composer require blar/hash

### Installation per Git

    $ git clone https://github.com/blar/hash.git
