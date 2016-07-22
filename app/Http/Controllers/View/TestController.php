<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Eshop\Repositories\ProductRepository;
use Eshop\Services\ThriftService;
use Illuminate\Http\Request;
use App\Entity\Product;
use Log;

class TestController extends Controller
{
  protected $productRepository;
  protected $thriftService;

  public function __construct(ThriftService $thriftService, ProductRepository  $productRepository)
  {
    $this->productRepository = $productRepository;
    $this->thriftService = $thriftService;

  }

  public function index()
  {
    //$ID = $request->session()->getId();
    $products = Product::find(1);
   //$this->productRepository->test();
    return $products;
    //return view('home')->with('products', $products);



  }

}




