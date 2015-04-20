<?php

/**
 * @author Andreas Treichel <gmblar+github@gmail.com>
 */

namespace Blar\Hash;

use PHPUnit_Framework_TestCase as TestCase;

class HashTest extends TestCase {

    public function testMd5() {
        $hash = new Hash('md5');
        $hash->update('Hello World');
        $this->assertEquals('b10a8db164e0754105b7a99be72e3fe5', $hash);
    }

    public function testSha1() {
        $hash = new Hash('sha1');
        $hash->update('Hello World');
        $this->assertEquals('0a4d55a8d778e5022fab701977c5d840bbc486d0', $hash);
    }

    public function testMd5Hmac() {
        $hash = new Hash('md5', '1337');
        $hash->update('foo');
        $hash->update('bar');
        $this->assertEquals('62e42cfc474a466eb401c9406a50492e', $hash);
    }

    public function testClone() {
        $foo = new Hash('sha1');
        $foo->update('foo');

        $foobar = clone $foo;
        $foobar->update('bar');

        $this->assertEquals('0beec7b5ea3f0fdbc95d0dd47f3c5bc275da8a33', $foo);
        $this->assertEquals('8843d7f92416211de9ebb963ff4ce28125932878', $foobar);
    }

}
