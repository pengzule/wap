<?php

namespace Eshop\Repositories;

use App\Entity\Product;

class ProductRepository extends EloquentRepository
{

    /**
     * 注入Product Model
     */
    protected $product;

    /**
     * ProductRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function test()
    {
        $product = $this->find(1);
        return $product;
    }



}