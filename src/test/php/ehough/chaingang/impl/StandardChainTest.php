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
        $context = Mockery::mock('ehough_chaingang_api_Context');
        $command = Mockery::mock('ehough_chaingang_api_Command');

        $command->shouldReceive('execute')->with($context)->once()->andReturn(true);

        $this->_sut->addCommand($command);

        $result = $this->_sut->execute($context);

        $this->assertTrue($result);
    }

    public function tearDown()
    {
        Mockery::close();
    }

}