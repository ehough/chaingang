<?php
/**
 * Copyright 2012 Eric D. Hough (http://ehough.com)
 *
 * This file is part of chaingang (https://github.com/ehough/chaingang)
 *
 * chaingang is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * chaingang is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with chaingang.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

use \Mockery as m;

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
        m::close();
    }

}