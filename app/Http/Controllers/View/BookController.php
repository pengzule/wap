<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entity\Category;
use App\Entity\Product;
use App\Entity\PdtContent;
use App\Entity\PdtImages;
use App\Entity\PdtComments;
use App\Entity\CartItem;
use App\Models\M3Result;
use Log;


class BookController extends Controller
{
  public function toCategory(Request $request)
  {

    Log::info('进入分类',['url'=>$request->url()]);

    $categorys = Category::whereNull('parent_id')->get();
    return view('category')->with('categorys', $categorys);
  }

  public function toProduct($category_id)
  {

    $products = Product::where('category_id', $category_id)->get();
    return view('product')->with('products', $products)
                          ->with('category_id', $category_id);
  }

  public function toPdtContent(Request $request, $product_id)
  {
    $product = Product::find($product_id);
    $pdt_content = PdtContent::where('product_id', $product_id)->first();
    $pdt_images = PdtImages::where('product_id', $product_id)->get();

    $count = 0;

    $member = $request->session()->get('member', '');
    if($member != '') {
      $cart_items = CartItem::where('member_id', $member->id)->get();

      foreach ($cart_items as $cart_item) {
        if($cart_item->product_id == $product_id) {
          $count = $cart_item->count;
          break;
        }
      }
    } else {
      $bk_cart = $request->cookie('bk_cart');
      $bk_cart_arr = ($bk_cart!=null ? explode(',', $bk_cart) : array());

      foreach ($bk_cart_arr as $value) {   // 一定要传引用
        $index = strpos($value, ':');
        if(substr($value, 0, $index) == $product_id) {
          $count = (int) substr($value, $index+1);
          break;
        }
      }
    }

    return view('pdt_content')->with('product', $product)
                              ->with('pdt_content', $pdt_content)
                              ->with('pdt_images', $pdt_images)
                              ->with('count', $count);
  }

  public function toSearch(Request $request)
  {
    $category = '';
    $keyword =  $request->input('keyword', '');
    $products = Product::where('name', 'like','%'.$keyword.'%')->get();

    return view('product')->with('products', $products)
        ->with('category_id', $category)
        ->with('keyword', $keyword);
  }
  public function toProdSort(Request $request)
  {
    $orderDir = $request->input('orderDir','');
    $name = $request->input('name','');
    $category_id = $request->input('category_id','');
    $keyword = $request->input('keyword','');



    if($category_id != ''){
      $products = Product::where('category_id',$category_id)->orderby($name,$orderDir)->get();
    }else{
      $products = Product::where('name', 'like','%'.$keyword.'%')->orderby($name,$orderDir)->get();
    }


    $m3_result = new M3Result;
    $m3_result->status = 0;
    $m3_result->message = '返回成功';
    $m3_result->products =  $products;
    Log::info('产品sort');
    return $m3_result->toJson();


  }

  public function toProdDetail(Request $request)
  {
    $m3_result = new M3Result;
    $name = $request->input('name','');
    $product_id = $request->input('product_id','');

    if($name == 'comment'){
      $results =PdtComments::where('product_id',$product_id)->get();

    }else{
      $product = Product::where('id', $product_id)->first();
      $results = $product->summary;
      $m3_result->status = 1;
      $m3_result->message = '返回成功';
      $m3_result->results =  $results;
      Log::info('产品详情');
      return $m3_result->toJson();
    }

    $m3_result->status = 2;
    $m3_result->message = '返回成功';
    $m3_result->results =  $results;
    Log::info('产品详情');
    return $m3_result->toJson();


  }


}
