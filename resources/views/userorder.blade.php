@extends('default')

@section('title', '我的订单')

@section('content')
    <div class="fanhui_cou">
        <div class="fanhui_1"></div>
        <div class="fanhui_ding">顶部</div>
    </div>
    <header class="header">
        <div class="fix_nav">
            <div class="nav_inner">
                <a class="nav-left back-icon" href="javascript:history.back();">返回</a>
                <div class="tit">我的订单</div>
            </div>
        </div>
    </header>

    <div class="container" id="container2">
        <div class="row">
            <ul class="order-mod-filter clearfix mb10">
                <div class="white-bg_2 bb1">

                    <li id="allorder " class="active pzl_orderclick"><a
                                title="默认排序"  href="javascript:void(0);">全部</a></li>
                    <li id="topay"   class=" pzl_orderclick"><a title=""
                                       href="javascript:void(0);" >待付款
                           
                        </a></li>
                    <li id="tosend"  class=" pzl_orderclick"><a title=""
                                           href="javascript:void(0);" >待发货
                            
                        </a></li>
                    <li id="torecv" class=" pzl_orderclick" ><a title=""
                                       href="javascript:void(0);" >待收货
                           
                        </a></li>
                     <li id="todone"  class=" pzl_orderclick"><a title=""
                                   href="javascript:void(0);" >已完成
                       
                    </a></li>
                </div>
            </ul>
            <input type="hidden" value="{{$member_id}}" class="myorder_memberid">
            <div class="item-list" id="container" rel="2" status="0">
            
                @foreach($orders as $order)
                <div class="list-group mb10">
                    <a href="#" class="list-group-item tip">
                    {{$order->order_no}}
                    <div  class="gary pull-right ">
                            @if($order->status == 1)
                             未支付
                            @else
                             已支付
                            @endif
                        </div>
                       
                    </a>
                    @foreach($order->order_items as $order_item)
                    <div class="hproduct clearfix" style="background:#DDDDDD;border-top:0px;">
                        <div class="p-pic"><img style="max-height:100px;margin:auto;" class="img-responsive" src="{{$order_item->product->preview}}"></div>
                        <div class="p-info">
                            <p class="p-title">{{$order_item->product->name}}</p>
                            <p ></p>
                            <p class="p-origin"><em class="price">¥{{$order_item->product->price}}<span style="float: right">x{{$order_item->count}}</span></em>
                            </p>
                        </div>
                    </div>
                    @endforeach
                    <div class="list-group-item" style="color: #1b1b1b">
                        共{{count($order->order_items)}}商品&nbsp;合计：￥{{$order->total_price}}
                    </div>
                </div>
                    @endforeach
                   
            </div>
            <div id="ajax_loading" style="display:none;width:300px;margin: 10px  auto 15px;text-align:center;">
                <img src="images/loading.gif">
            </div>


        </div>
    </div>

    <div class="clear"></div>

    <footer class="footer">
        <div class="foot-con">
            <div class="foot-con_2">
                <a href="/home">
                    <i class="navIcon home"></i>
                    <span class="text">首页</span>
                </a>
                <a  href="/category">
                    <i class="navIcon sort"></i>
                    <span class="text">分类</span>
                </a>
                <a href="/cart">
                    <i class="navIcon shop"></i>
                    <span class="text">购物车</span>
                </a>
                <a class="active" href="/userhome">
                    <i class="navIcon member"></i>
                    <span class="text">我的</span>
                </a>
            </div>
        </div>
    </footer>


@endsection

@section('my-js')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            //绑定 点击事件
            $(".pzl_orderclick").bind("click",function() {
                var id = $(this).attr("id");
                var name = '';
                var member_id =$('.myorder_memberid').val() ;
                $(".pzl_orderclick").each(function(i) {
                    if (id != $(this).attr("id")) {
                        $(this).removeClass("active");
                    }
                });
                $(this).addClass("active");
                if (id == 'topay') {
                    name = 'topay';
                } else if (id == 'tosend') {
                    name = 'tosend';
                } else if (id == 'torecv') {
                    name = 'torecv';
                } else if (id == 'todone') {
                    name = 'todone';
                }else if (id == 'allorder') {
                    name = 'allorder';
                }
                $.ajax({
                    type: "GET",
                    url: '/myorder',
                    dataType: 'json',
                    cache: false,
                    data: {member_id:member_id,name:name, _token: "{{csrf_token()}}"},
                    success: function(data) {
                        console.log("获取:");
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

                        $('#container').html('');
                        $('#pzl_status').html('');
                        for(var i=0; i<data.orders.length; i++) {
                             if(data.orders[i].status == 1){
                            var node =
                        '<div class="list-group mb10">'+
                                    '<a href="#" class="list-group-item tip">'+
                                   data.orders[i].order_no+
                                       
                         '<div  class="gary pull-right ">'+
                           
                             '未支付'+
                           
                        '</div>'+
                            '</a>'+

                                    '<div class="list-group-item" style="color: #1b1b1b">'+
                                    '共10商品&nbsp;合计：￥'+data.orders[i].total_price+
                    '</div>'+
                        '</div>';
                        }else if(data.orders[i].status == 3){
                             var node =
                        '<div class="list-group mb10">'+
                                    '<a href="#" class="list-group-item tip">'+
                                   data.orders[i].order_no+
                                       
                         '<div  class="gary pull-right ">'+
                           
                             '已支付'+
                           
                        '</div>'+
                            '</a>'+

                                    '<div class="list-group-item" style="color: #1b1b1b">'+
                                    '共10商品&nbsp;合计：￥'+data.orders[i].total_price+
                    '</div>'+
                        '</div>';
                            }


                                    $('#container').append(node);
                                   
                        }
                        
                       
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
                    }
                });
            });
        });


    </script>

@endsection
