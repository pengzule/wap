<?php

/*
   +----------------------------------------------------------------------+
   |                  			   platform                    	  	  |
   +----------------------------------------------------------------------+
   | Copyright (c) 2014 tercel_lzp@163.com All rights reserved.      |
   +----------------------------------------------------------------------+
   | TQSOA-SOA相关配置									      	 	  	  |
   +----------------------------------------------------------------------+
   | Authors: LaiZuopeng      CreateTime:2016-05-26       |
   +----------------------------------------------------------------------+
*/

return array(
    'soa_client' => array(
        'bbs'   => 'http://192.168.226.111:8080',
        'store'     => 'http://192.168.226.79:2002/v3/Soa/',
        'trade'     => 'http://192.168.226.79:6000/v2/Soa/',
        'tqmq'      => 'http://192.168.226.79:5001/v1/Soa/',
        'tqco'      => 'http://192.168.226.79:5000/v1/Soa/',
    ),
    'soa_auth_ip' => array(
        '127.0.0.1',
        '10.10.*.*',
    ),
    'soa_protocol' => array(
	'account'   => 'json',
        'store'     => 'yar',
        'bbs'     => 'thrift',
    ),
);

/*

// 载入配置文件
$configArray = array(
    'db_config.php',
    'api_config.php',
    'cache_config.php',
    'soa_config.php',
    'server_config.php',
);

foreach($configArray as $value){
    if (is_readable(VERSION_PATH . '/config/' . $value)) {
        $config      = require(VERSION_PATH . '/config/' . $value);
        $GLOBALS['G_CONFIG'] = array_merge($GLOBALS['X_G'], $config);
    }

}
*/
