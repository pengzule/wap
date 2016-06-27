<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Log;
use App\Soa\SoaClient;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
  public function xml()
  {
    return view('xml');
  }
  public function index()
  {
    $GLOBALS['G_CONFIG'] = array();
    $GLOBALS['G_CONFIG']['SoaRoot'] = '/mnt/hgfs/linux_code/wap/app/Soa';
    $config      = require($GLOBALS['G_CONFIG']['SoaRoot'] . '/soa_config.php');

    $GLOBALS['G_CONFIG'] = array_merge($GLOBALS['G_CONFIG'], $config);
    $soa = SoaClient::getSoa('bbs','service');
    //$thriftClient = new ThriftClient($soa,'xxx',3);
    //echo var_dump($soa);
    $method = '1';
    $params = array("2");
    $result = $soa->getAndSet($method, json_encode($params));
    $result = json_decode($result);
    return view('home')->with('products', $result);
   // return $result;
  }

  public function test()
  {
    //return Redirect::to('/test');
    return redirect('/test');
  }
  public function form()
  {

    return view('dataform');
  }

}