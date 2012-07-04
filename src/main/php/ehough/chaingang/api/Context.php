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
 * A Context represents the state information that is accessed and manipulated
 * by the execution of a Command or a Chain
 */
interface ehough_chaingang_api_Context
{

    /**
     * Removes all mappings from this map.
     *
     * @return void
     */
    function clear();

    /**
     * Returns true if this map contains a mapping for the specified key.
     *
     * @param string $key Key whose presence in this map is to be tested.
     *
     * @return bool True if this map contains a mapping for the specified key, false otherwise.
     */
    function containsKey($key);

    /**
     * Returns true if this map maps one or more keys to the specified value.
     *
     * @param mixed $value value whose presence in this map is to be tested.
     *
     * @return bool True if this map maps one or more keys to the specified value.
     */
    function containsValue($value);

    /**
     * Returns the value to which this map maps the specified key. Returns null
     * if the map contains no mapping for this key. A return value of null does
     * not necessarily indicate that the map contains no mapping for the key; it's
     * also possible that the map explicitly maps the key to null. The containsKey
     * operation may be used to distinguish these two cases.
     *
     * @param string $key Key whose associated value is to be returned.
     *
     * @return mixed The value to which this map maps the specified key, or null if the
     *               map contains no mapping for this key.
     */
    function get($key);

    /**
     * Returns true if this map contains no key-value mappings.
     *
     * @return bool True if this map contains no key-value mappings.
     */
    function isEmpty();

    /**
     * Associates the specified value with the specified key in this map. If the map
     * previously contained a mapping for this key, the old value is replaced by
     * the specified value.
     *
     * @param string $key   Key with which the specified value is to be associated.
     * @param mixed  $value Value to be associated with the specified key.
     *
     * @return mixed Previous value associated with specified key, or null if there
     *               was no mapping for key. A null return can also indicate that
     *               the map previously associated null with the specified key, if
     *               the implementation supports null values.
     */
    function put($key, $value);

    /**
     * Copies all of the mappings from the specified map to this map (optional operation).
     * The effect of this call is equivalent to that of calling put(k, v) on this map
     * once for each mapping from key k to value v in the specified map.
     *
     * @param array $values Mappings to be stored in this map.
     *
     * @return void
     */
    function putAll($values);

    /**
     * Removes the mapping for this key from this map if it is present.
     *
     * @param string $key Key whose mapping is to be removed from the map.
     *
     * @return mixed Previous value associated with specified key, or null if there was no mapping for key.
     */
    function remove($key);

    /**
     * Returns the number of key-value mappings in this map.
     *
     * @return int The number of key-value mappings in this map.
     */
    function size();
}