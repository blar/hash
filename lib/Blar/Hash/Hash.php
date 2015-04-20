<?php

/**
 * @author Andreas Treichel <gmblar+github@gmail.com>
 */

namespace Blar\Hash;

use RuntimeException;

/**
 * Class Hash
 *
 * @package Blar\Hash
 */
class Hash {

    /**
     * @var resource
     */
    private $handle;

    /**
     * @var string
     */
    private $algo;

    /**
     * @var string
     */
    private $hmacSecret;

    /**
     * @param string $algo
     */
    public function __construct($algo, $hmacSecret = NULL) {
        $this->algo = $algo;
        $this->hmacSecret = $hmacSecret;
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->getValue();
    }

    public function __clone() {
        $handle = hash_copy($this->getHandle());
        $this->setHandle($handle);
    }

    /**
     * @return resource
     */
    protected function createHandle() {
        if(is_null($this->hmacSecret)) {
            return hash_init($this->algo);
        }

        return hash_init($this->algo, HASH_HMAC, $this->hmacSecret);
    }

    /**
     * @return resource
     */
    protected function getHandle() {
        if(!$this->handle) {
            $this->handle = $this->createHandle();
        }
        return $this->handle;
    }

    /**
     * @param resource $handle
     * @return $this
     */
    protected function setHandle($handle) {
        $this->handle = $handle;
        return $this;
    }

    /**
     * @param string $data
     */
    public function update($data) {
        $result = hash_update($this->getHandle(), $data);
        if(!$result) {
            throw new RuntimeException();
        }
    }

    /**
     * @param string $fileName
     */
    public function updateFile($fileName) {
        $result = hash_update_file($this->getHandle(), $fileName);
        if(!$result) {
            throw new RuntimeException();
        }
    }

    /**
     * @param resource $stream
     */
    public function updateStream($stream) {
        $result = hash_update_stream($this->getHandle(), $stream);
        if(!$result) {
            throw new RuntimeException();
        }
    }

    /**
     * @return string
     */
    public function getValue() {
        $handle = hash_copy($this->getHandle());
        return hash_final($handle);
    }

}
