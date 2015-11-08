<?php

/**
 * @author Andreas Treichel <gmblar+github@gmail.com>
 */

namespace Blar\Hash;

/**
 * Class HmacHash
 *
 * @package Blar\Hash
 */
class HmacHash extends Hash {

    /**
     * @var string
     */
    private $secret;

    /**
     * @param string $algo
     * @param string $secret
     */
    public function __construct($algo, $secret) {
        parent::__construct($algo);
        $this->setSecret($secret);
    }

    /**
     * @return string
     */
    public function getSecret() {
        return $this->secret;
    }

    /**
     * @param string $secret
     * @return $this
     */
    protected function setSecret($secret) {
        $this->secret = $secret;
        return $this;
    }

    /**
     * @return resource
     */
    protected function createHandle() {
        return hash_init($this->getAlgo(), HASH_HMAC, $this->getSecret());
    }

}
