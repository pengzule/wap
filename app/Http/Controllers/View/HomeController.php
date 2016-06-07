<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entity\Product;
use App\Entity\PdtImages;
use App\Entity\CartItem;
use Log;

class HomeController extends Controller
{

  public function index(Request $request)
  {
    $ID = $request->session()->getId();

    $products = Product::all();
    return view('home')->with('products', $products)
        ->with('ID', $ID);
  }

}