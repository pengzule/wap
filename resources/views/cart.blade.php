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
  <div class="container ">
    <div class="row rowcar">
      <ul class="list-group">
        <li class="list-group-item text-primary">
          <div class="icheck pull-left mr5">
            <input type="checkbox" checked="checked" class="ids" prodStatus="1"  itemkey=""/>
            <label class="checkLabel">
              <span></span>
            </label>
          </div>
          朗尊软件</li>
        <li class="list-group-item hproduct clearfix">
          <div class="p-pic"><a href="/views/663"><img class="img-responsive" src="img/1787bd1d-9381-402b-b98e-97ceeddf7692.jpg"></a></div>
          <div class="p-info">
            <a href="/views/663"><p class="p-title">艾吉贝2015新款多层收纳真皮单肩斜挎包女包头层牛皮斜跨小包包女</p></a>
            <p class="p-attr">
              <span>颜色：红色；</span></p>
            <p class="p-origin">
              <a class="close p-close" onclick="deleteShopCart('','艾吉贝2015新款多层收纳真皮单肩斜挎包女包头层牛皮斜跨小包包女','663','1358')" href="javascript:void(0);">×</a>
              <em class="price">¥179.00</em>
            </p>
          </div>
        </li>
        <li class="list-group-item clearfix">
          <div class="pull-left mt5">
            <span class="gary">小计：</span>
            <em class="red productTotalPrice">¥179.00</em>
          </div>
          <div class="btn-group btn-group-sm control-num">
            <a onclick="disDe(this)" href="javascript:void(0);" class="btn btn-default"><span class="glyphicon glyphicon-minus gary"></span></a>
            <input type="tel" class="btn gary2 Amount" readonly="readonly" value="1" maxlength="4" itemkey="" prodId="663" skuId="1358">
            <a onclick="increase(this)" href="javascript:void(0);" class="btn btn-default"><span class="glyphicon glyphicon-plus gary"></span></a>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <div class="fixed-foot">
    <div class="fixed_inner">
      <div class="pay-point">
        <div class="icheck pull-left mr10">
          <input type="checkbox" checked="checked" id="buy-sele-all" value="1">
          <label for="buy-sele-all">
            <span class="mt10"></span>全选
          </label>
        </div>
        <p>合计：<em class="red f22">¥<span id="totalPrice">179.00</span></em></p>
      </div>
      <div class="buy-btn-fix">
        <a href="javascript:submitShopCart();" class="btn btn-danger btn-buy">去结算</a>
      </div>
    </div>
  </div>
  <div class="clear"></div>

@endsection

@section('my-js')
<script type="text/javascript">
  var contextPath = '';

  $('input:checkbox[name=cart_item]').click(function(event) {
    var checked = $(this).attr('checked');
    if(checked == 'checked') {
      $(this).attr('checked', false);
      $(this).next().removeClass('weui_icon_checked');
      $(this).next().addClass('weui_icon_unchecked');
    } else {
      $(this).attr('checked', 'checked');
      $(this).next().removeClass('weui_icon_unchecked');
      $(this).next().addClass('weui_icon_checked');
    }
  });

  function _toCharge() {
    var product_ids_arr = [];
    $('input:checkbox[name=cart_item]').each(function(index, el) {
      if($(this).attr('checked') == 'checked') {
        product_ids_arr.push($(this).attr('id'));
      }
    });

    if(product_ids_arr.length == 0) {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('请选择提交项');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return;
    }

    // 如果是微信浏览器
    var is_wx = 0;
    var ua = navigator.userAgent.toLowerCase();//获取判断用的对象
    if (ua.match(/MicroMessenger/i) == "micromessenger") {
      is_wx = 1;
    }

    location.href = '/order_commit?product_ids=' + product_ids_arr + '&is_wx=' + is_wx;
    // $('input[name=product_ids]').val(product_ids_arr+'');
    // $('input[name=is_wx]').val(is_wx+'');
    // $('#order_commit').submit();
  }


  function _onDelete() {
    var product_ids_arr = [];
    $('input:checkbox[name=cart_item]').each(function(index, el) {
      if($(this).attr('checked') == 'checked') {
        product_ids_arr.push($(this).attr('id'));
      }
    });

    if(product_ids_arr.length == 0) {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('请选择删除项');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return;
    }

    $.ajax({
      type: "GET",
      url: '/service/cart/delete',
      dataType: 'json',
      cache: false,
      data: {product_ids: product_ids_arr+''},
      success: function(data) {
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

        location.reload();
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
