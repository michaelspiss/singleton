<?php

namespace MichaelSpiss\DesignPatterns;

trait Singleton {
    /**
     * Associative array: [class_name => instance]
     * @var array $_instance
     */
    protected static $_instance;

    /**
     * Get the Singleton instance.
     * The class name is needed when the class using the trait is abstract.
     * @return static object using the Singleton trait
     */
    final public static function getInstance() {
        $class_name = get_called_class();
        if(!isset(self::$_instance[$class_name])) {
            self::$_instance[$class_name] = new $class_name();
        }
        return self::$_instance[$class_name];
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