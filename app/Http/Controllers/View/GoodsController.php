<?php

namespace App\Http\Controllers\View;

use App\Entity\CommentImages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entity\Category;
use App\Entity\Product;
use App\Entity\PdtContent;
use App\Entity\PdtImages;
use App\Entity\CommentImagesImages;
use App\Entity\PdtComments;
use App\Entity\CartItem;
use App\Models\Appresult;
use App\Entity\PdtCollect;
use Log;


class GoodsController extends Controller
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
    $pdt_comments = PdtComments::where('product_id',$product_id)->get();
    $counts = count($pdt_comments);

    $count = 0;
    $wish = '';
    $member = $request->session()->get('member', '');
    if($member != '') {
      $cart_items = CartItem::where('member_id', $member->id)->get();
      $wish = PdtCollect::where('member_id', $member->id)->where('product_id',$product_id)->first();
      foreach ($cart_items as $cart_item) {
        if($cart_item->product_id == $product_id) {
          $count = $cart_item->count;
          break;
        }
      }
    } else {
      $offline_cart = $request->cookie('offline_cart');
      $offline_cart_arr = ($offline_cart!=null ? explode(',', $offline_cart) : array());

      foreach ($offline_cart_arr as $value) {   // 一定要传引用
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
                              ->with('count', $count)
                              ->with('wish',$wish)
                              ->with('counts',$counts);
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
    
    $app_result = new Appresult;
    $app_result->status = 0;
    $app_result->message = '返回成功';
    $app_result->products =  $products;
    Log::info('产品sort');
    return $app_result->toJson();


  }

  public function toProdDetail(Request $request)
  {
    $app_result = new Appresult;
    $name = $request->input('name','');
    $product_id = $request->input('product_id','');
    if($name == 'comment'){
      $results =PdtComments::where('product_id',$product_id)->get();
      foreach($results as $result){
        $result->images = CommentImages::where('member_id',$result->member_id)->where('product_id',$result->product_id)->get();
      }
    }else{
      $product = Product::where('id', $product_id)->first();
      $results = $product->summary;
      $app_result->status = 1;
      $app_result->message = '返回成功';
      $app_result->results =  $results;
      Log::info('产品详情');
      return $app_result->toJson();
    }

    $app_result->status = 2;
    $app_result->message = '返回成功';
    $app_result->results =  $results;
    Log::info('产品详情');
    return $app_result->toJson();


  }

}
