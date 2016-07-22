<?php






/*
|--------------------------------------------------------------------------
| System Manager Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|


Route::get('/index', 'GenericAgentController@index');
Route::get('/parent', 'GenericAgentController@subchild' );
Route::get('/sendcommand', 'GenericAgentController@sendcommand' );



Route::get('/xml', 'View\HomeController@xml');
*/
/*
|--------------------------------------------------------------------------
| Broadcasting Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|

Route::get("/", function () {
  return view("index");
});
Route::resource("items", "ItemController", ["except" => ["create", "edit"]]);//排除掉create和edit操作
*/

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

Route::get('/test','View\TestController@index');


Route::get('/', 'View\HomeController@index');
Route::get('/home', 'View\HomeController@index');


Route::get('/form', 'View\HomeController@form');


Route::get('/login', 'View\MemberController@toLogin');
Route::get('/register', 'View\MemberController@toRegister');
Route::get('/logout', 'Service\MemberController@logout');


/***********************************使用thrift连接lumen***********************************/

Route::get('/category', 'View\CategoryController@index');
Route::get('/product/category_id/{category_id}', 'View\PdtCategoryController@index');
Route::get('/product/{product_id}', 'View\PdtContentController@index');
Route::get('/m_search/list', 'Service\PdtSearchController@index');
Route::get('/prodsort', 'Service\PdtSortController@index');
Route::get('/proddetail', 'View\PdtDetailController@index');






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

  Route::get('category/parent_id/{parent_id}', 'Service\GoodsController@getCategoryByParentId');
  Route::get('cart/add/{product_id}', 'Service\CartController@addCart');
  Route::get('cart/add/', 'Service\CartController@add');
  Route::get('cart/reduce/', 'Service\CartController@reduce');
  Route::get('cart/change', 'Service\CartController@cartChange');
  Route::get('cart/delete', 'Service\CartController@deleteCart');
  Route::get('wish/collect/{product_id}', 'Service\CartController@addWish');

  Route::post('alipay', 'Service\PayController@aliPay');
  Route::post('wxpay', 'Service\PayController@wxPay');
  Route::post('pay/ali_notify', 'Service\PayController@aliNotify');
  Route::get('pay/ali_result', 'Service\PayController@aliResult');
  Route::get('pay/ali_merchant', 'Service\PayController@aliMerchant');

  Route::post('pay/wx_notify', 'Service\PayController@wxNotify');
});

Route::group(['middleware' => 'check.login'], function ()  {

  Route::match(['get', 'post'], '/order_commit', 'View\OrderController@toOrderCommit');
  Route::match(['get', 'post'], '/order_confirm', 'View\OrderController@toOrderConfirm');
  Route::match(['get', 'post'], '/editaddress', 'View\OrderController@toeditaddress');
  Route::match(['get', 'post'], '/selectaddress', 'View\OrderController@toselectaddress');
  Route::match(['get', 'post'], '/order_comment', 'View\OrderController@toOrderComment');
  Route::match(['get', 'post'], '/sumbit_comment', 'View\OrderController@comment');
  Route::match(['get', 'post'], '/order_content/{order_id}', 'View\OrderController@toOrderContent');
  Route::match(['get', 'post'], '/service/buynow_confirm', 'Service\CartController@buyNow');

  /***********************************使用thrift连接lumen***********************************/
  Route::get('/userhome', 'View\PerlCenterController@index');



  Route::get('/order_list', 'View\OrderController@toOrderList');
  Route::get('/userinfo', 'View\MemberController@toUserInfo');

  Route::get('/mydev', 'View\MemberController@toMydev');
  Route::get('/myaddress', 'View\MemberController@toMyaddress');
  Route::get('/mywish', 'View\MemberController@toMywish');
  Route::get('/mycomment', 'View\MemberController@toMycomment');
  
});



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



