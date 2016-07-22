<?php

namespace Eshop\Services;

use App\Soa\SoaClient;


class ThriftService
{
    /**
     * @var SoaClient
     */
    protected $soaClient;

    /**
     * ThriftService constructor.
     * @param SoaClient $soaClient
     */
    public function __construct ( SoaClient $soaClient )
    {
        $this->soaClient = $soaClient;
    }

    /**
     * @param $method
     * @param $params
     * @return mixed
     */
    public function connect ( $method , $params )
    {
        $soa = $this->soaClient->getSoa ( 'bbs' , 'service' );
        $result = $soa->getAndSet ( $method , $params );
        return $result;
    }

}