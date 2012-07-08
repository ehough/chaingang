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

final class ehough_chaingang_impl_StandardChainTest extends PHPUnit_Framework_TestCase
{
    private $_sut;

    public function setUp()
    {
        parent::setUp();

        $this->_sut = new ehough_chaingang_impl_StandardChain();
    }

    public function testCommandCanHandle()
    {
        $context = m::mock('ehough_chaingang_api_Context');
        $command = m::mock('ehough_chaingang_api_Command');

        $command->shouldReceive('execute')->with($context)->once()->andReturn(true);

        $this->_sut->addCommand($command);

        $result = $this->_sut->execute($context);

        $this->assertTrue($result);
    }

    public function tearDown()
    {
        m::close();
    }

}