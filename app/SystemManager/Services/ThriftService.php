<?php

namespace App\SystemManager\Services;

use App\Soa\SoaClient;

class ThriftService
{
    protected $soaClient;


    public function __construct(SoaClient $soaClient)
    {
        $this->soaClient = $soaClient;
    }

    public function connect($command)
    {
        $GLOBALS['G_CONFIG'] = array();
        $GLOBALS['G_CONFIG']['SoaRoot'] = '/mnt/hgfs/linux_code/wap/app/Soa';
        $config      = require($GLOBALS['G_CONFIG']['SoaRoot'] . '/soa_config.php');

        $GLOBALS['G_CONFIG'] = array_merge($GLOBALS['G_CONFIG'], $config);
        $soa = $this->soaClient->getSoa('bbs','service');

        $result = $soa->getAndSet($command);
        return $result;
    }


}