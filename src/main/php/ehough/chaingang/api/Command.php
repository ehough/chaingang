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

/**
 * This class is heavily based on the Commons Chain project.
 * http://commons.apache.org/chain
 *
 * Licensed to the Apache Software Foundation (ASF) under one or more
 * contributor license agreements.  See the NOTICE file distributed with
 * this work for additional information regarding copyright ownership.
 * The ASF licenses this file to You under the Apache License, Version 2.0
 * (the "License"); you may not use this file except in compliance with
 * the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * A Command encapsulates a unit of processing work to be performed, whose
 * purpose is to examine and/or modify the state of a transaction that is
 * represented by a Context. Individual Commands can be assembled into a Chain,
 * which allows them to either complete the required processing or delegate
 * further processing to the next Command in the Chain.
 *
 * Command implementations typically retrieve and store state information in
 * the Context instance that is passed as a parameter to the execute() method,
 * using particular keys into the Map that can be acquired via Context.getAttributes().
 */
interface ehough_chaingang_api_Command
{
    /**
     * Commands should return CONTINUE_PROCESSING if the processing of the given
     * Context should be delegated to a subsequent Command in an enclosing Chain.
     */
    const CONTINUE_PROCESSING = false;

    /**
     * Commands should return PROCESSING_COMPLETE if the processing of the given
     * Context has been completed.
     */
    const PROCESSING_COMPLETE = true;

    /**
     * Execute a unit of processing work to be performed. This Command may either
     * complete the required processing and return true, or delegate remaining
     * processing to the next Command in a Chain containing this Command by
     * returning false.
     *
     * @param ehough_chaingang_api_Context $context The Context to be processed by this Command.
     *
     * @return true if the processing of this Context has been completed, or false if the
     *              processing of this Context should be delegated to a subsequent Command
     *              in an enclosing Chain.
     */
    function execute(ehough_chaingang_api_Context $context);
}