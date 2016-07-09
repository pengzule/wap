<?php

namespace Eshop\Services;

use App\Soa\SoaClient;


class ThriftService
{
    protected $soaClient;


    public function __construct(SoaClient $soaClient)
    {
        $this->soaClient = $soaClient;
    }

    public function connect($method,$params)
    {
        $soa = $this->soaClient->getSoa('bbs','service');
        $result = $soa->getAndSet($method,$params);
        return $result;
    }


}