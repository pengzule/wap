<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App;
use Log;
use Illuminate\Http\Request;
use Eshop\Services\ThriftService;

class HomeController extends Controller
{
    protected $thriftService;

    public function __construct ( ThriftService $thriftService )
    {
        $this->thriftService = $thriftService;
    }

    /**
     * @return mixed
     */
    public function index (Request $request)
    {

        //$result = $this->thriftService->connect ( 2 , json_encode ( array ( '2' ) ) );
        //$result = json_decode ( $result );

        //echo $request->ip();
        return view ( 'home' );
    }




}