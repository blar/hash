<?php

/**
 * @author Andreas Treichel <gmblar+github@gmail.com>
 */

namespace Blar\Hash;

use PHPUnit_Framework_TestCase as TestCase;

class HmacHashTest extends TestCase {

    public function testMd5() {
        $hash = new HmacHash('md5', 1337);
        $hash->push('Hello World');
        $this->assertEquals('53d98cf0aa1b21b7fc2c676a86106221', $hash);
    }

    public function testSha1() {
        $hash = new Hash('sha1', 1337);
        $hash->push('Hello World');
        $this->assertEquals('0a4d55a8d778e5022fab701977c5d840bbc486d0', $hash);
    }

    public function testClone() {
        $foo = new HmacHash('sha1', 1337);
        $foo->push('foo');

        $foobar = clone $foo;
        $foobar->push('bar');

        $this->assertEquals('c2dc7694d120f7c286e69f896ee15243a5c28cf5', $foo);
        $this->assertEquals('ea51ab0e6bc7bd5503fc721b7f566abb637ae651', $foobar);
    }

}
