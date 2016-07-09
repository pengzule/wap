<?php

namespace Eshop\Repositories;

use App\Entity\Category;
use App\Http\Controllers\Controller;

class CategoryRepository extends Controller
{

    /**
     * 注入Product Model
     */
    private $category;

    /**
     * ProductRepository constructor.
     * @param Category $product
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function toCategory()
    {
        return $this->category->whereNull('parent_id')->get();
    }



}