@extends('default')

@section('title', '购物车')

@section('content')
  <div class="fanhui_cou">
    <div class="fanhui_1"></div>
    <div class="fanhui_ding">顶部</div>
  </div> <header class="header header_1">
    <div class="fix_nav">
      <div class="nav_inner">
        <a class="nav-left back-icon" href="javascript:history.back();">返回</a>
        <div class="tit">购物车</div>
      </div>
    </div>
  </header>

  @if(count($cart_items) == 0)
  <div class=" ">
    <div class=" ">
      <div class="empty" style="margin-top: 40px;">
        <center style="width:120px;margin:0 auto;"><img style="width:100%;padding-bottom:20px;" src="/images/cartIcon.png"></center>
        <center style="padding-top:10px;"><span>您的购物车还是空的，赶紧行动吧！</span></center>
        <center style="width:100px;height:35px;margin: 60px auto 0;"><a href="/"><div style="width:100px;height:35px;background:#6a94e7;text-align:center;line-height:35px;border-radius: 3px;color:#fff;float:left;">返回购物</div></a></center>
      </div>
    </div>
  </div>
  @else
  <div class="container ">
    <div class="row rowcar">
    @foreach($cart_items as $cart_item)
    <ul class="list-group" id="{{$cart_item->product->id}}">
      <li class="list-group-item text-primary" style="height: 42px;">
        <div class="icheck pull-left mr5">
          <input type="checkbox"  class="ids" name="cart_item" id="{{$cart_item->product->id}}"/>
          <label class="checkLabel">
            <span></span>
          </label>
        </div>


      </li>
      <li class="list-group-item hproduct clearfix">
        <div class="p-pic"><a href="/product/{{$cart_item->product->id}}"><img class="img-responsive" src="{{$cart_item->product->preview}}"></a></div>
        <div class="p-info">
          <a href="/product/{{$cart_item->product->id}}"><p class="p-title ">{{$cart_item->product->name}}</p></a>
          <p class="p-attr">
            <span class="pzl_total" id="{{$cart_item->product->price}}"></span></p>
          <p class="p-origin">
            <a class="close p-close" onclick="_deleteShopCart('{{$cart_item->product->name}}','{{$cart_item->product->id}}')" href="javascript:void(0);">×</a>
            <em class="price">¥{{$cart_item->product->price}}</em>
          </p>
        </div>
      </li>
      <li class="list-group-item clearfix">
        <div class="pull-left mt5">
          <span class="gary">小计：</span>
          <em class="red productTotalPrice" >¥{{$cart_item->product->price * $cart_item->count}}.00</em>
        </div>
        <div class="btn-group btn-group-sm control-num">
          <a onclick="disDe(this);" href="javascript:void(0);" class="btn btn-default"><span class="glyphicon glyphicon-minus gary"></span></a>
          <input type="tel" class="btn gary2 Amount" readonly="readonly" id="itemcount" value="{{$cart_item->count}}" maxlength="4" itemkey="{{$cart_item->product->id}}" >
          <a onclick="increase(this);" href="javascript:void(0);" class="btn btn-default"><span class="glyphicon glyphicon-plus gary"></span></a>


        </div>
      </li>
    </ul>
    @endforeach
    </div>
  </div>
  @endif
  <footer class="footer">
      <div class="fixed-foot">
    <div class="fixed_inner">
      <div class="pay-point">
        <div class="icheck pull-left mr10">
          <input type="checkbox"   class="ids" id="buy-sele-all" />
          <label for="buy-sele-all">
            <span class="mt10"></span>全选
          </label>
        </div>
        <p>合计：<em class="red f22">¥<span id="totalPrice">0</span></em></p>
      </div>
      <div class="buy-btn-fix">
        <a href="javascript:;" onclick="_toCharge()" class="btn btn-danger btn-buy">去结算</a>
      </div>
    </div>
  </div>
  </footer>
  <div class="clear"></div>


@endsection

@section('my-js')
<script type="text/javascript">
  var contextPath = '';

  function _toCharge() {
    var product_ids_arr = [];
    $('input:checkbox[name=cart_item]').each(function(index, el) {
      if($(this).attr('checked') == 'checked') {
        product_ids_arr.push($(this).attr('id'));
      }
    });

    if(product_ids_arr.length == 0) {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('请选择要结算的商品');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return;
    }



    location.href = '/order_confirm?product_ids=' + product_ids_arr;
    // $('input[name=product_ids]').val(product_ids_arr+'');
    // $('input[name=is_wx]').val(is_wx+'');
    // $('#order_commit').submit();
  }

  function _add(obj) {
    var _this = $(obj);
    var _count_obj=_this.prev();
    var product_id=$(_count_obj).attr('itemkey');
    $.ajax({
      type: "GET",
      url: '/service/cart/add/',
      dataType: 'json',
      cache: false,
      data: { product_id:product_id,_token: "{{csrf_token()}}"},
      success: function(data) {
        console.log(data);
        if(data == null) {
          $('.bk_toptips').show();
          $('.bk_toptips span').html('服务端错误');
          setTimeout(function() {$('.bk_toptips').hide();}, 2000);
          return;
        }
        if(data.status != 0) {
          $('.bk_toptips').show();
          $('.bk_toptips span').html(data.message);
          setTimeout(function() {$('.bk_toptips').hide();}, 2000);
          return;
        }


      },
      error: function(xhr, status, error) {
        console.log(xhr);
        console.log(status);
        console.log(error);
      }
    });
  }

  function _reduce(obj) {
    var _this = $(obj);
    var _count_obj=_this.next();
    var product_id=$(_count_obj).attr('itemkey');
    var count =Number($(_count_obj).val());

    $.ajax({
      type: "GET",
      url: '/service/cart/reduce/',
      dataType: 'json',
      cache: false,
      data: { product_id:product_id,count:count,_token: "{{csrf_token()}}"},
      success: function(data) {
        console.log(data);
        if(data == null) {
          $('.bk_toptips').show();
          $('.bk_toptips span').html('服务端错误');
          setTimeout(function() {$('.bk_toptips').hide();}, 2000);
          return;
        }
        if(data.status != 0) {
          $('.bk_toptips').show();
          $('.bk_toptips span').html(data.message);
          setTimeout(function() {$('.bk_toptips').hide();}, 2000);
          return;
        }

      },
      error: function(xhr, status, error) {
        console.log(xhr);
        console.log(status);
        console.log(error);
      }
    });
  }


</script>
@endsection
