<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'View\HomeController@index');
Route::get('/home', 'View\HomeController@index');

Route::get('/login', 'View\MemberController@toLogin');
Route::get('/register', 'View\MemberController@toRegister');
Route::get('/logout', 'Service\MemberController@logout');


Route::get('/category', 'View\BookController@toCategory');
Route::get('/product/category_id/{category_id}', 'View\BookController@toProduct');
Route::get('/product/{product_id}', 'View\BookController@toPdtContent');
Route::get('/m_search/list', 'View\BookController@toSearch');
Route::get('/prodsort', 'View\BookController@toProdSort');
Route::get('/proddetail', 'View\BookController@toProdDetail');
Route::get('/myorder', 'View\OrderController@toMyOrder');

Route::get('/cart', 'View\CartController@toCart');

Route::group(['prefix' => 'service'], function () {
  Route::get('validate_code/create', 'Service\ValidateController@create');
  Route::post('validate_phone/send', 'Service\ValidateController@sendSMS');
  Route::post('upload/{type}', 'Service\UploadController@uploadFile');

  Route::post('register', 'Service\MemberController@register');
  Route::post('login', 'Service\MemberController@login');
  Route::post('editaddress', 'Service\MemberController@editaddress');
  Route::post('selectaddress', 'Service\MemberController@selectaddress');


  Route::post('isPhoneExist', 'Service\MemberController@isPhoneExist');

  Route::get('category/parent_id/{parent_id}', 'Service\BookController@getCategoryByParentId');
  Route::get('cart/add/{product_id}', 'Service\CartController@addCart');
  Route::get('cart/add/', 'Service\CartController@add');
  Route::get('cart/reduce/', 'Service\CartController@reduce');
  Route::get('cart/delete', 'Service\CartController@deleteCart');
  Route::get('wish/collect/{product_id}', 'Service\CartController@addWish');





  Route::post('alipay', 'Service\PayController@aliPay');
  Route::post('wxpay', 'Service\PayController@wxPay');

  Route::post('pay/ali_notify', 'Service\PayController@aliNotify');
  Route::get('pay/ali_result', 'Service\PayController@aliResult');
  Route::get('pay/ali_merchant', 'Service\PayController@aliMerchant');

  Route::post('pay/wx_notify', 'Service\PayController@wxNotify');
});


Route::match(['get', 'post'], '/order_commit', 'View\OrderController@toOrderCommit')->middleware(['check.cart', 'check.weixin']);
Route::match(['get', 'post'], '/order_confirm', 'View\OrderController@toOrderConfirm')->middleware(['check.login']);
Route::match(['get', 'post'], '/buynow_confirm', 'View\OrderController@toBuyNow')->middleware(['check.login']);
Route::match(['get', 'post'], '/editaddress', 'View\OrderController@toeditaddress')->middleware(['check.login']);
Route::match(['get', 'post'], '/selectaddress', 'View\OrderController@toselectaddress')->middleware(['check.login']);
Route::get('/order_list', 'View\OrderController@toOrderList')->middleware(['check.login']);
Route::get('/userinfo', 'View\MemberController@toUserInfo')->middleware(['check.login']);
Route::get('/userhome', 'View\MemberController@toMyhome')->middleware(['check.login']);
Route::get('/mydev', 'View\MemberController@toMydev')->middleware(['check.login']);
Route::get('/myaddress', 'View\MemberController@toMyaddress')->middleware(['check.login']);
Route::get('/mywish', 'View\MemberController@toMywish')->middleware(['check.login']);
Route::get('/mycomment', 'View\MemberController@toMycomment')->middleware(['check.login']);

/***********************************后台相关***********************************/

Route::group(['prefix' => 'admin'], function () {

  Route::get('login', 'Admin\IndexController@toLogin');
  Route::get('exit', 'Admin\IndexController@toExit');
  Route::post('service/login', 'Admin\IndexController@login');

  Route::group(['middleware' => 'check.admin.login'], function () {

    Route::group(['prefix' => 'service'], function () {
      Route::post('category/add', 'Admin\CategoryController@categoryAdd');
      Route::post('category/del', 'Admin\CategoryController@categoryDel');
      Route::post('category/edit', 'Admin\CategoryController@categoryEdit');

      Route::post('product/add', 'Admin\ProductController@productAdd');
      Route::post('product/del', 'Admin\ProductController@productDel');
      Route::post('product/edit', 'Admin\ProductController@productEdit');

      Route::post('member/edit', 'Admin\MemberController@memberEdit');

      Route::post('order/edit', 'Admin\OrderController@orderEdit');
    });

    Route::get('index', 'Admin\IndexController@toIndex');

    Route::get('category', 'Admin\CategoryController@toCategory');
    Route::get('category_add', 'Admin\CategoryController@toCategoryAdd');
    Route::get('category_edit', 'Admin\CategoryController@toCategoryEdit');

    Route::get('product', 'Admin\ProductController@toProduct');
    Route::get('product_info', 'Admin\ProductController@toProductInfo');
    Route::get('product_add', 'Admin\ProductController@toProductAdd');
    Route::get('product_edit', 'Admin\ProductController@toProductEdit');

    Route::get('member', 'Admin\MemberController@toMember');
    Route::get('member_edit', 'Admin\MemberController@toMemberEdit');

    Route::get('order', 'Admin\OrderController@toOrder');
    Route::get('order_edit', 'Admin\OrderController@toOrderEdit');
  });
});
