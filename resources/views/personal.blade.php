@extends('default')

@section('title', '个人中心')

@section('content')

  <div class="maincontainer">
    <div class="container" style="max-width:768px;margin:0 auto;">
      <div class="row">
        <a href="/userinfo">
          <div class="member_top member_top_1">
            <div class="member_top_bg"><img  src="images/member_bg.png"></div>
            <div class="member_m_pic member_m_pic_1">
              <img class="img-circle" src="images/noavatar.png">
            </div>
            <div  class="member_m_z member_m_z_1">
              <div class="member_m_x">{{$member->name}}</div>
            </div>
            <div class="member_m_r">账户管理、收货地址&gt;
            </div>
          </div></a>
        <div class="member_mp_img" data-toggle="modal" data-target="#myModalmin" data-title="我的名片" data-tpl="mp"><img src="images/member_mp_img.png"></div>
        <div class="list-group mb10">
          <a href="/order_list" class="list-group-item tip">
            <div class="list_group_img">
              <img src="images/member_img16.png"></div>
            我的订单
            <span class="gary pull-right">查看全部</span>
          </a>
          <div class="list-group-item p0 clearfix">
            <div class="col-xs-3 p0">
              <a class="order_tab_link" href="#" id="forpay">
                <em class="order_img">
                  <img src="images/order_bg_3.png"></em>待付款

              </a>
            </div>
            <div class="col-xs-3 p0">
              <a class="order_tab_link" href="#"id="forsend">
                <em class="order_img">
                  <img src="images/order_bg_2.png"></em>待发货
              </a>
            </div>
            <div class="col-xs-3 p0">
              <a class="order_tab_link" href="#"id="forrecv">
                <em class="order_img">
                  <img src="images/order_bg_1.png"></em>待收货
              </a>
            </div>
            <div class="col-xs-3 p0">
              <a class="order_tab_link" href="#"id="fordone">
                <em class="order_img">
                  <img src="images/order_bg.png"></em>已完成
              </a>
            </div>
          </div>
        </div>
        <div class="list-group mb10 member_list_group clearfix">
          <a href="/mywish" class="list-group-item col-xs-4">
            <div class="m_img"><img src="images/order_bg_5.png"></div>
            <p class="m_name">我的收藏</p>
            <span class="red">{{count($wishes)}}</span>
          </a>
          <a href="/mycomment" class="list-group-item col-xs-4">
            <div class="m_img"><img src="images/order_bg_8.png"></div>
            <p class="m_name">我的评论</p>
            <span class="red">{{count($comments)}}</span>
          </a>
          <a href="#" class="list-group-item col-xs-4">
            <div class="m_img"><img src="images/order_bg_4.png"></div>
            <p class="m_name">收件箱</p>
            <span class="red">0</span>
          </a>

          <a href="#" class="list-group-item col-xs-4">
            <div class="m_img"><img src="images/order_bg_7.png"></div>
            <p class="m_name">系统消息</p>
            <span class="red">0</span>
          </a>

        </div>

        <div class="list-group mb10">
          <a href="/mydev" class="list-group-item tip">
            <div class="list_group_img">
              <img src="images/member_img16.png"></div>
            我的设备
            <span class="gary pull-right">查看全部</span>
          </a>
          <div class="list-group-item p0 clearfix">
            <div class="col-xs-3 p0">
              <a class="order_tab_link" href="#">
                <em class="order_img">
                  <img src="images/order_bg_3.png"></em>

              </a>
            </div>
            <div class="col-xs-3 p0">
              <a class="order_tab_link" href="#">
                <em class="order_img">
                  <img src="images/order_bg_2.png"></em>
              </a>
            </div>
            <div class="col-xs-3 p0">
              <a class="order_tab_link" href="#">
                <em class="order_img">
                  <img src="images/order_bg_1.png"></em>
              </a>
            </div>
            <div class="col-xs-3 p0">
              <a class="order_tab_link" href="#">
                <em class="order_img">
                  <img src="images/order_bg.png"></em>
              </a>
            </div>
          </div>
        </div>

        <div class="list-group mb10">
          <a href="#" class="list-group-item tip">
            <div class="list_group_img"><img src="images/order_bg_10.png"></div>
            常见问题
          </a>
          <a href="#" class="list-group-item tip">
            <div class="list_group_img"><img src="images/order_bg_9.png"></div>
            意见反馈
          </a>
        </div>

      </div>
    </div>
    <div style="display: none;" class="modal fade" id="myModalmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="form-horizontal" role="form" data-method="formAjax">
            <div class="modal-header member_tc_top">
              <button type="button" class="close member_tc_xx" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">&nbsp;&nbsp;</h4>
            </div>
            <div style="overflow:hidden;width: 100%;padding-top: 20px;">
              <div style="">
                <div class="member_mp_t_img" >
                  <img src="images/noavatar.png">
                </div>
                <div class="member_mp_t_m">{{$member->name}}</div>
                <div class="member_mp_t_m_m">
                  <img src="img/a909bfc1-cada-4008-81c0-556ff86aace1.jpg">
                </div>
                <div class="member_mp_t_tit">扫一扫二维码</div>
              </div>
            </div>
            <div style="height:60px;"></div>
          </form>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="foot-con">
        <div class="foot-con_2">
          <a href="/home">
            <i class="navIcon home"></i>
            <span class="text">首页</span>
          </a>
          <a href="/category">
            <i class="navIcon sort"></i>
            <span class="text">分类</span>
          </a>
          <a href="/cart">
            <i class="navIcon shop"></i>
            <span class="text">购物车</span>
          </a>
          <a href="/userhome" class="active">
            <i class="navIcon member"></i>
            <span class="text">我的</span>
          </a>
        </div>
      </div>
    </footer>
  </div>

@endsection

@section('my-js')
  <script type="text/javascript">
    $(document).ready(function(){
      var attr = parseInt($(".member_m_pic_1").height());
      var attr3 = parseInt($(".member_m_z_1").height());
      var h = attr - attr3;
      var clientWidth=document.body.clientWidth;
      $(".member_mp_t_img img").css("width",clientWidth*0.3);
      $(".member_mp_t_img img").css("height",clientWidth*0.3);

      handleUserPic();
    });

    function handleUserPic(){
      var th = $(".member_m_pic").outerHeight(true);
      if(th<60){
        setTimeout("handleUserPic",500);
      }else{
        $(".member_m_pic .img-circle").css("height",th*0.9);
        $(".member_m_pic .img-circle").css("width",th*0.9);
      }

    }

    jQuery(document).ready(function() {
      //绑定 点击事件
      $(".order_tab_link").bind("click",function() {
        var id = $(this).attr("id");
        var name = '';

        if (id == 'forpay') {
          name = 'topay';
        }else if(id == 'forsend'){
          name = 'tosend';
        }
        else if(id == 'forrecv'){
          name = 'torecv';
        }
        else if(id == 'fordone'){
          name = 'todone';
        }

        location.href = '/order_list?name=' + name;

      });
    });
  </script>

@endsection
