<?php

namespace MichaelSpiss\DesignPatterns\Tests;

class SingletonTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The first test assures that no new object is instantiated on every
     * getInstance() call.
     */
    public function testSingleStaysSingle()
    {
        function setSingle() {
            Single::getInstance()->value = 4;
        }
        setSingle();
        $this->assertEquals(4, Single::getInstance()->value);
    }

    /**
     * Make sure the singleton trait does not mix up different classes
     */
    public function testClassesDoNotInterfere() {
        Single::getInstance()->value = 4;
        SecondSingle::getInstance()->value = 2;

        $this->assertEquals(4, Single::getInstance()->value);
        $this->assertEquals(2, SecondSingle::getInstance()->value);
    }

    /**
     * Make sure cloning is not possible
     */
    public function testCloningThrowsAnError() {
        // skip this test if running on a PHP version lower than 7 (causes fatal error)
        if(version_compare(PHP_VERSION, '7.0.0') < 0) {
            $this->markTestSkipped('PHP Fatal error if call to private or protected.');
        } else {
            $this->setExpectedException(\Error::class);
            $copy = clone Single::getInstance();
        }
    }

    /**
     * Make sure a singleton cannot be unserialized
     * (serialization + unserialization results in a clone of the singleton)
     */
    public function testUnserializationThrowsAnError() {
        $serialized = serialize(Single::getInstance());

        $this->setExpectedException(\PHPUnit_Framework_Error_Warning::class);
        unserialize($serialized);
    }

    /**
     * Make sure singletons cannot be instantiated via the "new" operator
     */
    public function testInstantiationViaNewOperatorThrowsError() {
        // skip this test if running on a PHP version lower than 7 (causes fatal error)
        if(version_compare(PHP_VERSION, '7.0.0') < 0) {
            $this->markTestSkipped('PHP Fatal error if call to private or protected.');
        } else {
            $this->setExpectedException(\Error::class);
            new Single();
        }
    }
}
