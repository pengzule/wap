<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entity\Product;
use Log;
use App\Soa\SoaClient;

class HomeController extends Controller
{
  public function index(Request $request)
  {
    error_reporting(E_ALL);
    $GLOBALS['G_CONFIG'] = array();
    $GLOBALS['G_CONFIG']['SoaRoot'] = '/mnt/hgfs/linux_code/wap/app/Soa';

    //$SoaRoot = '/jqm/smarthome/smarthome_v1/public/Soa';
    require($GLOBALS['G_CONFIG']['SoaRoot'] . '/SoaClient.php');
    require($GLOBALS['G_CONFIG']['SoaRoot'] . '/ThriftClient.php');
    $config      = require($GLOBALS['G_CONFIG']['SoaRoot'] . '/soa_config.php');

    $GLOBALS['G_CONFIG'] = array_merge($GLOBALS['G_CONFIG'], $config);
    echo json_encode($GLOBALS['G_CONFIG']);
    echo 'test-------------------------1';
    $soa = SoaClient::getSoa('bbs','service');

    //$thriftClient = new ThriftClient($soa,'xxx',3);
    echo 'getSoa-------------------------';
    //echo var_dump($soa);
    $method = 'pengzule';
    $params = 'clientParams';
    $result = $soa->getAndSet($method, $params);
    echo $result;
  }

}