<?php

namespace MichaelSpiss\DesignPatterns;

trait Singleton {
    protected static $_instance;

    /**
     * Get the Singleton instance.
     * @return static object using the Singleton trait
     */
    final public static function getInstance() {
        if(null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Don't allow object instantiation via the "new" operator.
     * It is not final, so actions can be performed on instantiation.
     * Please make sure not to require any arguments. If arguments
     * are needed, add an "init" method and call it after the first
     * instantiation.
     */
    protected function __construct() {}

    /**
     * Prevent clones of the Singleton instance
     */
    final private function __clone() {}

    /**
     * Prevent unserialization of a Singleton
     */
    final private function __wakeup() {}
}