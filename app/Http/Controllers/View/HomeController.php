<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Log;
use Eshop\Services\ThriftService;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  protected  $thriftService;

  public function __construct(ThriftService $thriftService)
  {
    $this->thriftService = $thriftService;
  }

  public function index()
  {
    $result = $this->thriftService->connect(1, json_encode(array('2')));
   // $result = json_decode($result);
    //return view('home')->with('products', $result);
   // $result =$result->id;
    return $result;
  }



}