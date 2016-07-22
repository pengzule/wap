<?php

namespace App\Http\Controllers\View;


use App\Http\Controllers\Controller;
use Eshop\Services\PerlCenterService;
use Illuminate\Http\Request;

class PerlCenterController extends Controller
{

    protected $perlCenterService;


    public function __construct ( PerlCenterService $perlCenterService )
    {
        $this->perlCenterService = $perlCenterService;
    }


    public function index ( Request $request )
    {
        return $this->perlCenterService->toPerlCenter ( $request );
    }
}