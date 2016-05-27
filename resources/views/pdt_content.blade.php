@extends('default')

@section('title',$product->name)

@section('content')

  <div class="fanhui_cou">
    <div class="fanhui_1"></div>
    <div class="fanhui_ding">顶部</div>
  </div>

  <header class="header">
    <div class="fix_nav">
      <div style="max-width:768px;margin:0 auto;background:#000;position: relative;">
        <a class="nav-left back-icon" href="javascript:history.back();">返回</a>
        <div class="tit">商品详细</div>
      </div>
    </div>
  </header>
  <div class="container">
    <div class="row white-bg">
      <div id="slide">
        <div class="hd">
          <ul>
            <ul>
              @foreach($pdt_images as $pdt_image)
              <li class=""></li>
              @endforeach
            </ul>
        </div>
        <div class="bd">
          <div class="tempWrap" style="overflow:hidden; position:relative;">
            <ul style="width: 3072px; position: relative; overflow: hidden; padding: 0px; margin: 0px; transition-duration: 200ms; transform: translateX(-768px);">
              @foreach($pdt_images as $pdt_image)
              <li style="display: table-cell; vertical-align: top; width: 768px;">

                  <img src="{{$pdt_image->image_path}}" alt="EOC" ppsrc="{{$pdt_image->image_path}}">

              </li>
                @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
    <script charset="utf-8" src="/js/TouchSlide.js"></script>



    <div class="row gary-bg">
      <div class="white-bg p10 details_con">
        <h1 class="item-name" id="prodName">{{$product->name}}</h1>
        <ul>
          <li>
            <label>价格：</label>
            <span class="price">¥<span class="price" id="prodCash">{{$product->price}}</span></span>
          </li>   
          <li>
            <label>数量：</label>
            <div class="count_div" style="height: 30px; width: 130px;">
              <a href="javascript:void(0);" class="minus" ></a>
              <input type="text" class="count" value="1" id="pro_count" readonly="readonly"/>
              <a href="javascript:void(0);" class="add" ></a>
            </div>
          </li>
        </ul>
      </div>
      <div id="goodsContent" class="goods-content white-bg">

        <div class="hd hd_fav">
          <ul >
            <input type="hidden" value="{{$product->id}}" class="pzl_proddetail">
            <li id="pzl_img"  class="act  pzl_detail">图文详情</li>
            <li id="pzl_param" class="pzl_detail">规格参数</li>
            <li id="pzl_comment" class="pzl_detail">评价({{$product->comment_count}})</li>
          </ul>
        </div>

        <div class="tempWrap" style="overflow:hidden; position:relative;">
          <div style="width: 2304px; position: relative; overflow: hidden; padding: 0px; margin: 0px; transition-duration: 200ms; transform: translateX(0px);" class="bd">
            <ul style="display: table-cell; vertical-align: top; max-width: 768px;width: 100%;" class="property">
              <div class="prop-area" style="min-height:300px;overflow: hidden;">
                @foreach($pdt_images as $pdt_image)
                  <img src="{{$pdt_image->image_path}}" alt="" />
                @endforeach
              @if($pdt_content != null)
                {!! $pdt_content->content !!}
              @else

              @endif
              </div>
            </ul>
            <ul class="txt-imgs" style="display: table-cell; max-width: 768px;width: 100%;">
              <div class="desc-area" style="padding: 0px 10px 0 10px;">

              </div>
            </ul>
            <ul style="display: table-cell; vertical-align: top; width: 281px;" class="appraise ">

            </ul>
            </div>
        </div>
      </div>
    </div>
  </div>


  <footer class="footer">
    <div class="fixed-foot">
      <div class="fixed_inner">
        <a class="btn-fav " href="javascript:void(0);" onclick="_collect();">
          @if($wish == '')
          <i class="collect i-fav "></i><span>收藏</span>
          @else
          <i class="collect i-fav i-fav-active"></i><span>收藏</span>
          @endif
        </a>
        <a class="cart-wrap" href="/cart">
          <i class="i-cart"></i>
          <span>购物车</span>
          <span class="add-num" id="totalNum">{{$count}}</span>
        </a>
        <div class="buy-btn-fix">
          <a class="btn  btn-cart"  onclick="_addCart();" href="javascript:void(0);">加入购物车</a>
          <a class="btn  btn-buy" onclick="_buyNow();" href="javascript:void(0);">立即购买</a>
        </div>
      </div>
    </div>
  </footer>


  <div class="clear"></div>

  <script type="text/javascript">


    //插件：图片轮播
    TouchSlide({
      slideCell:"#slide",
      titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
      mainCell:".bd ul",
      effect:"left",
      autoPlay:false,//自动播放
      autoPage:true, //自动分页
      switchLoad:"_src" //切换加载，真实图片路径为"_src"
    });

    var scrollTop = 0;
    TouchSlide({
      slideCell:"#goodsContent",
      startFun:function(i,c){
        var prodId = $("#prodId").val();
        if(i==1){//规格参数
          var th = jQuery("#goodsContent .bd ul").eq(i);
          if(!th.hasClass('hadGoodsContent')){

          }

          if($(window).scrollTop() > scrollTop){
            $(window).scrollTop(scrollTop);
          }

        }else if(i==2){//评价
          var th = jQuery("#goodsContent .bd ul").eq(i);

          if(!th.hasClass('hadConments')){

          }

          if($(window).scrollTop() > scrollTop){
            $(window).scrollTop(scrollTop);
          }
        }else{
          if(scrollTop == 0){
            $(window).scrollTop(scrollTop);
            var hd_fav = $('.hd_fav');
            var position = hd_fav.position();

            scrollTop = position.top;
          }
        }
      },
    });

  </script>

@endsection

@section('my-js')
<script type="text/javascript">

  function _addCart() {
    var product_id = "{{$product->id}}";
    var pro_count =  $("#pro_count").val();
    $.ajax({
      type: "GET",
      url: '/service/cart/add/' + product_id,
      dataType: 'json',
      cache: false,
      data: {pro_count: pro_count, _token: "{{csrf_token()}}"},
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
        var count = data.message;
        var num = $('#totalNum').html();
        if(num == '') num = 0;
        $('#totalNum').html(Number(num) + Number(count));

      },
      error: function(xhr, status, error) {
        console.log(xhr);
        console.log(status);
        console.log(error);
      }
    });
  }

  function _collect() {
    var product_id = "{{$product->id}}";
    $.ajax({
      type: "GET",
      url: '/service/wish/collect/' + product_id,
      dataType: 'json',
      cache: false,
      data: { _token: "{{csrf_token()}}"},
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
        $('.collect').addClass("i-fav-active");
      },
      error: function(xhr, status, error) {
        console.log(xhr);
        console.log(status);
        console.log(error);
      }
    });
  }

  function _buyNow() {
    var product_id = "{{$product->id}}";
    var pro_count =  $("#pro_count").val();

    location.href = '/buynow_confirm?product_id=' + product_id + '&count=' + pro_count;
  }



  function _toCart() {
    location.href = '/cart';
  }
</script>


@endsection
