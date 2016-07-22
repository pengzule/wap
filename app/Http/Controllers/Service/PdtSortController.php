<?php

namespace App\Http\Controllers\Service;


use App\Http\Controllers\Controller;
use Eshop\Services\PdtSortService;
use Illuminate\Http\Request;

class PdtSortController extends Controller
{
    /**
     * @var PdtSortService
     */
    protected $pdtSortService;

    /**
     * PdtSortController constructor.
     * @param PdtSortService $pdtSortService
     */
    public function __construct ( PdtSortService $pdtSortService )
    {
        $this->pdtSortService = $pdtSortService;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function index ( Request $request )
    {
        return $this->pdtSortService->toPdtSort ( $request );
    }
}
