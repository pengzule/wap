@extends('default')

@section('title', '艾吉贝2015新款多层收纳真皮单肩斜挎包女包头层牛皮斜跨小包包女')

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
  <input type="hidden" id="prodId" value="663"/>
  <input id="currSkuId" value="" type="hidden"/>
  <div class="container">
    <div class="row white-bg">
      <div id="slide">
        <div class="hd">
          <ul>
            <ul><li class="on">1</li><li class="on">2</li><li class="on">3</li></ul>
        </div>
        <div class="bd">
          <div class="tempWrap" style="overflow:hidden; position:relative;">
            <ul style="width: 3072px; position: relative; overflow: hidden; padding: 0px; margin: 0px; transition-duration: 200ms; transform: translateX(-768px);">
              <li style="display: table-cell; vertical-align: top; width: 768px;">
                <a href="#" target="_blank">
                  <img src="/img/products/1.jpg" alt="EOC" ppsrc="/img/products/1.jpg">
                </a>
              </li>
              <li style="display: table-cell; vertical-align: top; width: 768px;">
                <a href="#" target="_blank">
                  <img src="/img/products/2.jpg" alt="EOC" ppsrc="/img/products/2.jpg">
                </a>
              </li>
              <li style="display: table-cell; vertical-align: top; width: 768px;">
                <a href="#" target="_blank">
                  <img src="/img/products/3.jpg" alt="EOC" ppsrc="/img/products/3.jpg">
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <script charset="utf-8" src="/js/TouchSlide.js"></script>

    <script type="text/javascript">

      TouchSlide({
        slideCell:"#slide",
        titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell:".bd ul",
        effect:"left",
        autoPlay:true,//自动播放
        autoPage:true, //自动分页
        switchLoad:"_src" //切换加载，真实图片路径为"_src"
      });
    </script>


    <div class="row gary-bg">
      <div class="white-bg p10 details_con">
        <h1 class="item-name" id="prodName">艾吉贝2015新款多层收纳真皮单肩斜挎包女包头层牛皮斜跨小包包女</h1>
        <ul>
          <li>
            <label>商城价格：</label>
            <span class="price">¥<span class="price" id="prodCash">179.00</span></span>
          </li>
          <li id="choose_0" index="0" >
            <label id="propName" propname="颜色">颜色：</label>
            <dl>
              <dd key="208:635" valId="635" >黑色<span></span></dd>
              <dd class="check" key="208:636" valId="636" >红色<span></span></dd>
              <dd key="208:661" valId="661" >黄色<span></span></dd>
            </dl>
          </li>
          <li>
            <label>数量：</label>
            <div class="count_div" style="height: 30px; width: 130px;">
              <a href="javascript:void(0);" class="minus" ></a>
              <input type="text" class="count" value="1" id="prodCount" readonly="readonly"/>
              <a href="javascript:void(0);" class="add" ></a>
            </div>
          </li>
        </ul>
      </div>
      <div id="goodsContent" class="goods-content white-bg">

        <div class="hd hd_fav">
          <ul>
            <li class="on">图文详情</li>
            <li class="">规格参数</li>
            <li class="">评价(0)</li>
          </ul>
        </div>

        <div class="tempWrap" style="overflow:hidden; position:relative;">
          <div style="width: 2304px; position: relative; overflow: hidden; padding: 0px; margin: 0px; transition-duration: 200ms; transform: translateX(0px);" class="bd">
            <ul style="display: table-cell; vertical-align: top; max-width: 768px;width: 100%;" class="property">
              <div class="prop-area" style="min-height:300px;overflow: hidden;">
                <img src="/img/8a9740c7-7f8e-4f20-ba64-1e90dd596ebe.jpg" alt="" /></div>
            </ul>
            <ul class="txt-imgs" style="display: table-cell; vertical-align: top; max-width: 768px;width: 100%;">
              <div class="desc-area" style="padding: 0px 10px 0 10px;">
                <li style="height:30px;">
                  <div id="ajax_loading" style="margin: 10px  auto 15px;text-align:center;">dddddadaddsdas </div>
                </li>
              </div>
            </ul>
            <ul style="display: table-cell; vertical-align: top; max-width: 768px;width: 100%;" class="appraise" rel="1" status="1">
              <div style="height:30px;">
                <div id="ajax_loading" style="margin: 10px  auto 15px;text-align:center;">sdfsdfdssf</div>
              </div>
              <div class="wap_page" style="display: none;" onclick="next_comments(this)"><span>下一页</span></div>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fixed-foot">
    <div class="fixed_inner">
      <a class="btn-fav" href="javascript:void(0);" onclick="addInterest(this,'663');">
        <i class="i-fav"></i><span>收藏</span>
      </a>
      <a class="cart-wrap" href="/shopcart">
        <i class="i-cart"></i>
        <span>购物车</span>
        <span class="add-num" id="totalNum">0</span>
      </a>
      <div class="buy-btn-fix">
        <a class="btn  btn-cart"  onclick="addShopCart();" href="javascript:void(0);">加入购物车</a>
        <a class="btn  btn-buy" onclick="buyNow();" href="javascript:void(0);">立即购买</a>
      </div>
    </div>
  </div>

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
            queryParameter(th,prodId);
          }

          if($(window).scrollTop() > scrollTop){
            $(window).scrollTop(scrollTop);
          }

        }else if(i==2){//评价
          var th = jQuery("#goodsContent .bd ul").eq(i);

          if(!th.hasClass('hadConments')){
            queryProdComment(th,prodId);
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
  var bullets = document.getElementById('position').getElementsByTagName('li');
  Swipe(document.getElementById('mySwipe'), {
    auto: 2000,
    continuous: true,
    disableScroll: false,
    callback: function(pos) {
      var i = bullets.length;
      while (i--) {
        bullets[i].className = '';
      }
      bullets[pos].className = 'cur';
    }
  });

  function _addCart() {
    var product_id = "{{$product->id}}";
    $.ajax({
      type: "GET",
      url: '/service/cart/add/' + product_id,
      dataType: 'json',
      cache: false,
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

        var num = $('#cart_num').html();
        if(num == '') num = 0;
        $('#cart_num').html(Number(num) + 1);

      },
      error: function(xhr, status, error) {
        console.log(xhr);
        console.log(status);
        console.log(error);
      }
    });
  }

  function _toCart() {
    location.href = '/cart';
  }
</script>


@endsection
