<?php
/**
 * Copyright 2006 - 2013 Eric D. Hough (http://ehough.com)
 *
 * This file is part of chaingang (https://github.com/ehough/chaingang)
 *
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/.
 */

final class ehough_chaingang_impl_StandardContextTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ehough_chaingang_impl_StandardContext
     */
    private $_sut;

    public function setUp()
    {
        parent::setUp();

        $this->_sut = new ehough_chaingang_impl_StandardContext();
    }

    public function testMultipleOps()
    {
        $this->_sut->putAll(array(

            'foo' => 'bar',
            'one' => 'two'
        ));

        $this->assertTrue($this->_sut->containsKey('foo'));
        $this->assertTrue($this->_sut->containsKey('one'));
        $this->assertTrue($this->_sut->containsValue('bar'));
        $this->assertTrue($this->_sut->containsValue('two'));
        $this->assertEquals(2, $this->_sut->size());
        $this->assertFalse($this->_sut->isEmpty());

        $this->assertEquals('bar', $this->_sut->get('foo'));
        $this->assertEquals('two', $this->_sut->get('one'));

        $this->_sut->clear();

        $result = $this->_sut->containsKey('foo');

        $this->assertFalse($result);
    }

    public function testBasicSingularOps()
    {
        $this->_sut->put('foo', 'bar');

        $this->assertTrue($this->_sut->containsKey('foo'));
        $this->assertTrue($this->_sut->containsValue('bar'));
        $this->assertEquals(1, $this->_sut->size());
        $this->assertFalse($this->_sut->isEmpty());

        $this->assertEquals('bar', $this->_sut->get('foo'));

        $this->_sut->remove('foo');

        $result = $this->_sut->containsKey('foo');

        $this->assertFalse($result);
    }

    public function testContextNotSet()
    {
        $result = $this->_sut->containsKey('foobar');

        $this->assertFalse($result);
    }

    public function tearDown()
    {
        ehough_mockery_Mockery::close();
    }

}