<?php

namespace App\Http\Controllers\View;


use App\Http\Controllers\Controller;
use Eshop\Services\PdtContentService;
use Illuminate\Http\Request;

class PdtContentController extends Controller
{
    /**
     * @var PdtContentService
     */
    protected $pdtContentService;

    /**
     * PdtContentController constructor.
     * @param PdtContentService $pdtContentService
     */
    public function __construct ( PdtContentService $pdtContentService )
    {
        $this->pdtContentService = $pdtContentService;
    }

    /**
     * @param Request $request
     * @param $product_id
     * @return mixed
     */
    public function index ( Request $request , $product_id )
    {
        return $this->pdtContentService->toPdtContent ( $request , $product_id );
    }
}
