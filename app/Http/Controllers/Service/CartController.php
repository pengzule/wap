<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppResult;
use App\Entity\PdtCollect;
use App\Entity\CartItem;

class CartController extends Controller
{
  public function addCart(Request $request, $product_id)
  {
    $count = $request->input('pro_count', '');
    $app_result = new AppResult;
    $app_result->status = 0;
    $app_result->message = '添加成功';

    // 如果当前已经登录
    $member = $request->session()->get('member', '');
    if($member != '') {
      $cart_items = CartItem::where('member_id', $member->id)->get();
      $exist = false;
      foreach ($cart_items as $cart_item) {
        if($cart_item->product_id == $product_id) {
          $cart_item->count += $count;
          $cart_item->save();
          $exist = true;
          break;
        }
      }
      if($exist == false) {
        $cart_item = new CartItem;
        $cart_item->product_id = $product_id;
        $cart_item->count = $count;
        $cart_item->member_id = $member->id;
        $cart_item->save();
      }
      $app_result->status = 0;
      $app_result->message = $count;
      return $app_result->toJson();
    }
    $app_result->status = 1;
    $app_result->message = '请先登录';
    return $app_result->toJson();
    /*$offline_cart = $request->cookie('offline_cart');
    $offline_cart_arr = ($offline_cart!=null ? explode(',', $offline_cart) : array());


    foreach ($offline_cart_arr as &$value) {   // 一定要传引用
      $index = strpos($value, ':');
      if(substr($value, 0, $index) == $product_id) {
        $count = ((int) substr($value, $index+1)) + 1;
        $value = $product_id . ':' . $count;
        break;
      }
    }

    if($count == 1) {
      array_push($offline_cart_arr, $product_id . ':' . $count);
    }

    return response($app_result->toJson())->withCookie('offline_cart', implode(',', $offline_cart_arr));*/
  }

  public function add(Request $request)
  {
    $product_id = $request->input('product_id', '');
    $app_result = new AppResult;
    // 如果当前已经登录
    $member = $request->session()->get('member', '');
    if($member != '') {
      $cart_items = CartItem::where('member_id', $member->id)->get();
      $exist = false;
      foreach ($cart_items as $cart_item) {
        if($cart_item->product_id == $product_id) {
          $cart_item->count += 1;
          $cart_item->save();
          $exist = true;
          break;
        }
      }
      $app_result->status = 0;
      $app_result->message ='返回成功';
      return $app_result->toJson();
    }
    $app_result->status = 1;
    $app_result->message = '请先登录';
    return $app_result->toJson();
  }

  public function reduce(Request $request)
  {
    $product_id = $request->input('product_id', '');
    $app_result = new AppResult;
    // 如果当前已经登录
    $member = $request->session()->get('member', '');
    if($member != '') {
      $cart_items = CartItem::where('member_id', $member->id)->get();

      $exist = false;
      foreach ($cart_items as $cart_item) {
        if($cart_item->product_id == $product_id) {
          $cart_item->count -= 1;
          $cart_item->save();
          $exist = true;
          break;
        }
      }
      $app_result->status = 0;
      $app_result->message = '返回成功';

      return $app_result->toJson();
    }
    $app_result->status = 1;
    $app_result->message = '请先登录';
    return $app_result->toJson();

  }

  public function cartChange(Request $request)
  {

    $product_id = $request->input('product_id', '');
    $type = $request->input('type', '');
    $count = $request->input('count','');
    $app_result = new AppResult;
    $app_result->status = 0;
    $app_result->message = $count;

    if ($count == 1){
      $app_result->status = 1;
      $app_result->message = '数量不可为负';
      return $app_result->toJson();
    }


    // 如果当前已经登录
    $member = $request->session()->get('member', '');
    if($member != '') {
      $cart_items = CartItem::where('member_id', $member->id)->get();

      if ($type == 'add'){
        foreach ($cart_items as $cart_item) {
          if($cart_item->product_id == $product_id) {
            $cart_item->count += 1;
            $cart_item->save();
            break;
          }
        }
      }else{
        foreach ($cart_items as $cart_item) {
          if($cart_item->product_id == $product_id) {
            $cart_item->count -= 1;
            $cart_item->save();
            break;
          }
        }
      }

      return $app_result->toJson();
    }
    $app_result->status = 1;
    $app_result->message = '请先登录';
    return $app_result->toJson();

  }

  public function deleteCart(Request $request)
  {
    $app_result = new AppResult;
    $app_result->status = 0;
    $app_result->message = '删除成功';

    $product_ids = $request->input('product_ids', '');
    if($product_ids == '') {
      $app_result->status = 1;
      $app_result->message = '产品ID为空';
      return $app_result->toJson();
    }
    $product_ids_arr = explode(',', $product_ids);

    $member = $request->session()->get('member', '');
    if($member != '') {
        // 已登录
        CartItem::whereIn('product_id', $product_ids_arr)->delete();
        return $app_result->toJson();
    }

    $product_ids = $request->input('product_ids', '');
    if($product_ids == '') {
      $app_result->status = 1;
      $app_result->message = '产品ID为空';
      return $app_result->toJson();
    }

    // 未登录
    $offline_cart = $request->cookie('offline_cart');
    $offline_cart_arr = ($offline_cart!=null ? explode(',', $offline_cart) : array());
    foreach ($offline_cart_arr as $key => $value) {
      $index = strpos($value, ':');
      $product_id = substr($value, 0, $index);
      // 存在, 删除
      if(in_array($product_id, $product_ids_arr)) {
        array_splice($offline_cart_arr, $key, 1);
        continue;
      }
    }
    return response($app_result->toJson())->withCookie('offline_cart', implode(',', $offline_cart_arr));
  }

  public function addWish(Request $request, $product_id)
  {
    $app_result = new AppResult;
    $app_result->status = 0;
    $app_result->message = '收藏成功';

    // 如果当前已经登录
    $member = $request->session()->get('member', '');
    if($member != '') {

      $wishes = PdtCollect::where('member_id', $member->id)->get();

      $exist = false;
      foreach ($wishes as $wish) {
        if($wish->product_id == $product_id) {
          PdtCollect::where('product_id',$product_id)->where('member_id', $member->id)->delete();
          $app_result->status = 1;
          $app_result->message = '取消收藏';
          return $app_result->toJson();
        }
      }
      if($exist == false) {
        $wish = new PdtCollect;
        $wish->member_id = $member->id;
        $wish->product_id = $product_id;
        $wish->save();
      }
      return $app_result->toJson();
    }
    $app_result->status = 1;
    $app_result->message = '请先登录';
    return $app_result->toJson();
  }
}
