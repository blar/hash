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
     * @param string $algo
     */
    public function __construct($algo) {
        $this->algo = $algo;
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
        return hash_init($this->algo);
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
     * @return string
     */
    public function getAlgo() {
        return $this->algo;
    }

    /**
     * @param string $algo
     * @return $this
     */
    protected function setAlgo($algo) {
        $this->algo = $algo;
        return $this;
    }

    /**
     * @param string $data
     * @return $this
     */
    public function push($data) {
        $result = hash_update($this->getHandle(), $data);
        if(!$result) {
            throw new RuntimeException();
        }
        return $this;
    }

    /**
     * @param string $fileName
     * @return $this
     */
    public function pushFile($fileName) {
        $result = hash_update_file($this->getHandle(), $fileName);
        if(!$result) {
            throw new RuntimeException();
        }
        return $this;
    }

    /**
     * @param $stream
     * @return $this
     */
    public function pushStream($stream) {
        $result = hash_update_stream($this->getHandle(), $stream);
        if(!$result) {
            throw new RuntimeException();
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getValue() {
        $handle = hash_copy($this->getHandle());
        return hash_final($handle);
    }

    /**
     * @return string
     */
    public function getRawValue() {
        $handle = hash_copy($this->getHandle());
        return hash_final($handle, true);
    }

}
