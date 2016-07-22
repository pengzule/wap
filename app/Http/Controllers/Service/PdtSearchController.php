<?php

namespace App\Http\Controllers\Service;


use App\Http\Controllers\Controller;
use Eshop\Services\PdtSearchService;
use Illuminate\Http\Request;

class PdtSearchController extends Controller
{
    /**
     * @var PdtSearchService
     */
    protected $pdtSearchService;

    /**
     * PdtSearchController constructor.
     * @param PdtSearchService $pdtSearchService
     */
    public function __construct ( PdtSearchService $pdtSearchService )
    {
        $this->pdtSearchService = $pdtSearchService;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index ( Request $request )
    {
        return $this->pdtSearchService->toPdtSearch ( $request );
    }
}
