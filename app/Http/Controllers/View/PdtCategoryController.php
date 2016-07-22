<?php

namespace App\Http\Controllers\View;


use App\Http\Controllers\Controller;
use Eshop\Services\PdtCategoryService;


class PdtCategoryController extends Controller
{
    /**
     * @var PdtCategoryService
     */
    protected $pdtCategoryService;

    /**
     * PdtCategoryController constructor.
     * @param PdtCategoryService $pdtCategoryService
     */
    public function __construct ( PdtCategoryService $pdtCategoryService )
    {
        $this->pdtCategoryService = $pdtCategoryService;
    }

    /**
     * @return mixed
     */
    public function index ( $category_id )
    {
        return $this->pdtCategoryService->toPdtCategory ( $category_id );
    }
}
