<?php

namespace App\Http\Controllers\View;


use App\Http\Controllers\Controller;
use Eshop\Services\CategoryService;


class CategoryController extends Controller
{
    /**
     * @var CategoryService
     */
    protected $categoryService;

    /**
     * CategoryController constructor.
     * @param CategoryService $categoryService
     */
    public function __construct ( CategoryService $categoryService )
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @return $this
     */
    public function index ()
    {
        return $this->categoryService->toCategory ();
    }
}
