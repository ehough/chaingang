<?php

__throwback::$config = array(

    'name'         => 'ehough_chaingang',
    'autoload'     => dirname(__FILE__) . '/../../main/php',
    'dependencies' => array(

        array('ehough/mockery', 'https://github.com/ehough/mockery.git', 'src/main/php')
    )
);
