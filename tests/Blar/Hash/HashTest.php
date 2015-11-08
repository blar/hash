<?php

/**
 * @author Andreas Treichel <gmblar+github@gmail.com>
 */

namespace Blar\Hash;

use PHPUnit_Framework_TestCase as TestCase;

class HashTest extends TestCase {

    public function testMd5FromString() {
        $hash = new Hash('md5');
        $hash->push('Hello World');

        $this->assertEquals('b10a8db164e0754105b7a99be72e3fe5', $hash);
        $this->assertEquals('b10a8db164e0754105b7a99be72e3fe5', $hash->getValue());
        $this->assertEquals(hex2bin('b10a8db164e0754105b7a99be72e3fe5'), $hash->getRawValue());
    }

    public function testMd5FromFile() {
        $hash1 = new Hash('md5');
        $hash1->pushFile(__DIR__.'/message1.bin');
        $this->assertEquals('008ee33a9d58b51cfeb425b0959121c9', (string) $hash1);

        $hash2 = new Hash('md5');
        $hash2->pushFile(__DIR__.'/message2.bin');
        $this->assertEquals('008ee33a9d58b51cfeb425b0959121c9', (string) $hash2);

        $this->assertEquals((string) $hash1, (string) $hash2);
    }

    public function testMd5FromStream() {
        $stream = fopen(__DIR__.'/message1.bin', 'r');
        $hash1 = new Hash('md5');
        $hash1->pushStream($stream);

        $this->assertEquals('008ee33a9d58b51cfeb425b0959121c9', (string) $hash1);
    }

    public function testSha1FromString() {
        $hash = new Hash('sha1');
        $hash->push('Hello World');
        $this->assertEquals('0a4d55a8d778e5022fab701977c5d840bbc486d0', $hash);
    }

    public function testClone() {
        $foo = new Hash('sha1');
        $foo->push('foo');

        $foobar = clone $foo;
        $foobar->push('bar');

        $this->assertEquals('0beec7b5ea3f0fdbc95d0dd47f3c5bc275da8a33', $foo);
        $this->assertEquals('8843d7f92416211de9ebb963ff4ce28125932878', $foobar);
    }

}
