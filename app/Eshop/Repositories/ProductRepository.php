<?php

namespace Eshop\Repositories;

use App\Entity\Product;

class ProductRepository
{

    /**
     * 注入Product Model
     */
    private $product;

    /**
     * ProductRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }



}