<?php

namespace App\Http\Controllers\View;


use App\Http\Controllers\Controller;
use Eshop\Services\PdtDetailService;
use Illuminate\Http\Request;

class PdtDetailController extends Controller
{
    /**
     * @var PdtDetailService
     */
    protected $pdtDetailService;

    /**
     * PdtDetailController constructor.
     * @param PdtDetailService $pdtDetailService
     */
    public function __construct ( PdtDetailService $pdtDetailService )
    {
        $this->pdtDetailService = $pdtDetailService;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index ( Request $request )
    {
        return $this->pdtDetailService->toPdtDetail ( $request );
    }
}