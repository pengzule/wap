<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entity\Product;
use Log;

class TestController extends Controller
{
  public function index(Request $request)
  {
    $ID = $request->session()->getId();
    $products = Product::find(1);
    return $products;
    //return view('home')->with('products', $products);


  }

}




