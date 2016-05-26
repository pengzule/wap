<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Faker\Provider\cs_CZ\Address;
use Illuminate\Http\Request;
use App\Entity\CartItem;
use App\Entity\Product;
use App\Entity\Addr;
use App\Entity\Order;
use App\Entity\OrderItem;
use App\Models\BKWXJsConfig;
use App\Tool\WXpay\WXTool;
use App\Models\M3Result;
use Log;

class OrderController extends Controller
{
  public function toOrderCommit(Request $request)
  {
    // 获取微信重定向返回的code
    $code = $request->input('code', '');
    if($code != '') {
      //获取code码，以获取openid
      $openid = WXTool::getOpenid($code);
      // 将openid保存到session
      $request->session()->put('openid', $openid);
    }

    $product_ids = $request->input('product_ids', '');

    $product_ids_arr = ($product_ids!='' ? explode(',', $product_ids) : array());

    $member = $request->session()->get('member', '');
    $cart_items = CartItem::where('member_id', $member->id)->whereIn('product_id', $product_ids_arr)->get();
    $address = Addr::where('member_id',$member->id)->where('default',1)->first();

    $order = new Order;
    $order->member_id = $member->id;
    $order->realname = $address->realname;
    $order->address = $address->province.$address->city.$address->county.$address->street;
    $order->phone = $address->phone;
    $order->save();

    $cart_items_arr = array();
    $cart_items_ids_arr = array();
    $total_price = 0;
    $name = '';
    foreach ($cart_items as $cart_item) {
      $cart_item->product = Product::find($cart_item->product_id);
      if($cart_item->product != null) {
        $total_price += $cart_item->product->price * $cart_item->count;
        $name .= ('《'.$cart_item->product->name.'》');
        array_push($cart_items_arr, $cart_item);
        array_push($cart_items_ids_arr, $cart_item->id);

        $order_item = new OrderItem;
        $order_item->order_id = $order->id;
        $order_item->product_id = $cart_item->product_id;
        $order_item->count = $cart_item->count;
        $order_item->pdt_snapshot = json_encode($cart_item->product);
        $order_item->save();
      }
    }
    CartItem::whereIn('id', $cart_items_ids_arr)->delete();

    $order->name = $name;
    $order->total_price = $total_price;
    $order->order_no = 'E'.time().''.$order->id;
    $order->save();

    // JSSDK 相关
    $access_token = WXTool::getAccessToken();
    $jsapi_ticket = WXTool::getJsApiTicket($access_token);
    $noncestr = WXTool::createNonceStr();
    $timestamp = time();
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    // 签名
    $signature = WXTool::signature($jsapi_ticket, $noncestr, $timestamp, $url);
    // 返回微信参数
    $bk_wx_js_config = new BKWXJsConfig;
    $bk_wx_js_config->appId = config('wx_config.APPID');
    $bk_wx_js_config->timestamp = $timestamp;
    $bk_wx_js_config->nonceStr = $noncestr;
    $bk_wx_js_config->signature = $signature;

    return view('order_commit')->with('cart_items', $cart_items_arr)
                               ->with('total_price', $total_price)
                               ->with('name', $name)
                               ->with('order_no', $order->order_no)
                               ->with('bk_wx_js_config', $bk_wx_js_config)
                                ->with('address',$address);
  }

  public function toOrderConfirm(Request $request)
  {
    Log::info("确认订单");

    $product_ids = $request->input('product_ids', '');


    $product_ids_arr = ($product_ids!='' ? explode(',', $product_ids) : array());

    $member = $request->session()->get('member', '');
    $cart_items = CartItem::where('member_id', $member->id)->whereIn('product_id', $product_ids_arr)->get();
    $address = Addr::where('member_id',$member->id)->where('default',1)->first();
    

    $cart_items_arr = array();
    $cart_items_ids_arr = array();
    $total_price = 0;
    $name = '';
    foreach ($cart_items as $cart_item) {
      $cart_item->product = Product::find($cart_item->product_id);
      if($cart_item->product != null) {
        $total_price += $cart_item->product->price * $cart_item->count;
        $name .= ('《'.$cart_item->product->name.'》');
        array_push($cart_items_arr, $cart_item);
        array_push($cart_items_ids_arr, $cart_item->id);
      }
    }
    return view('order_confirm')->with('cart_items', $cart_items_arr)
                                ->with('total_price', $total_price)
                                ->with('address',$address);

  }

  public function toOrderList(Request $request)
  {
    $member = $request->session()->get('member', '');
    $orders = Order::where('member_id', $member->id)->get();
    foreach ($orders as $order) {
      $order_items = OrderItem::where('order_id', $order->id)->get();
      $order->order_items = $order_items;
      foreach ($order_items as $order_item) {
        $order_item->product = json_decode($order_item->pdt_snapshot);
      }
    }

    //return view('order_list')->with('orders', $orders);
    return view('userorder')->with('orders', $orders)
        ->with('member_id',$member->id);
  }
  
   public function toeditaddress()
  {
    // 获取上一次请求的url
    $return_url = '';
    if(isset($_SERVER['HTTP_REFERER'])) {
      $return_url = $_SERVER['HTTP_REFERER'];
    }
    return view('editaddress')->with('return_url',$return_url);

  }

  /**
   * @param Request $request
   * @return mixed
     */
  public function toselectaddress(Request $request)
  {

    $product_ids = $request->input('product_ids', '');
    $member = $request->session()->get('member', '');
    $addresses = Addr::where('member_id',$member->id)->get();
    return view('selectaddress')->with('addresses',$addresses)
                          ->with('product_ids', $product_ids );


  }

  public function toBuyNow(Request $request)
  {
    Log::info("立即购买");
    $product_id = $request->input('product_id', '');
    $count = $request->input('count', '');

    $member = $request->session()->get('member', '');

    $cart_item = new CartItem;
    $cart_item->product_id = $product_id;
    $cart_item->count = $count;
    $cart_item->member_id = $member->id;
    $cart_item->save();

    $cart_items = CartItem::where('member_id', $member->id)->where('product_id', $product_id)->get();
    $address = Addr::where('member_id',$member->id)->where('default',1)->first();


    $cart_items_arr = array();
    $cart_items_ids_arr = array();
    $total_price = 0;
    $name = '';
    foreach ($cart_items as $cart_item) {
      $cart_item->product = Product::find($cart_item->product_id);
      if($cart_item->product != null) {
        $total_price += $cart_item->product->price * $cart_item->count;
        $name .= ('《'.$cart_item->product->name.'》');
        array_push($cart_items_arr, $cart_item);
        array_push($cart_items_ids_arr, $cart_item->id);
      }
    }
    CartItem::whereIn('id', $cart_items_ids_arr)->delete();
    return view('order_confirm')->with('cart_items', $cart_items_arr)
        ->with('total_price', $total_price)
        ->with('address',$address);

  }

  /**
   * @param Request $request
   
   public function toMyOrder(Request $request)
  {
    $m3_result = new M3Result;
    $name = $request->input('name','');
    $member_id = $request->input('member_id','');
    if($name == 'allorder'){
      $orders =Order::where('member_id',$member_id)->get();
    }
    if($name == 'topay'){
      $orders =Order::where('member_id',$member_id)->where('status',1)->get();
    }
    if($name == 'tosend'){
      $orders =Order::where('member_id',$member_id)->where('status',3)->get();
    }
    if($name == 'torecv'){
      $orders =Order::where('member_id',$member_id)->where('status',4)->get();
    }
    if($name == 'todone'){
      $orders =Order::where('member_id',$member_id)->where('status',5)->get();
    }

   
    $m3_result->status = 0;
    $m3_result->message = '返回成功';
    $m3_result->orders =  $orders;


    Log::info('我的订单');
    return $m3_result->toJson();


  }
   */
  public function toMyOrder(Request $request)
  {
    $m3_result = new M3Result;
    $name = $request->input('name','');
    $member_id = $request->input('member_id','');
    if($name == 'allorder'){
      $orders =Order::where('member_id',$member_id)->get();
    }
    if($name == 'topay'){
      $orders =Order::where('member_id',$member_id)->where('status',1)->get();
    }
    if($name == 'tosend'){
      $orders =Order::where('member_id',$member_id)->where('status',3)->get();
    }
    if($name == 'torecv'){
      $orders =Order::where('member_id',$member_id)->where('status',4)->get();
    }
    if($name == 'todone'){
      $orders =Order::where('member_id',$member_id)->where('status',5)->get();
    }

    foreach ($orders as $order) {
      $order_items = OrderItem::where('order_id', $order->id)->get();
      $order->order_items = $order_items;
      foreach ($order_items as $order_item) {
        $order_item->product = json_decode($order_item->pdt_snapshot);
      }
    }
    $m3_result->status = 0;
    $m3_result->message = '返回成功';
    $m3_result->orders =  $orders;


    Log::info('我的订单');
    return $m3_result->toJson();


  }

}
