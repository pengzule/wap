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
                    @if($name =='')
                        <li id="allorder " class="active pzl_orderclick">
                            <a title=""  href="javascript:void(0);">全部</a>
                        </li>
                        <li id="topay"   class=" pzl_orderclick">
                            <a title=""href="javascript:void(0);" >待付款</a>
                        </li>
                        <li id="tosend"  class=" pzl_orderclick">
                            <a title=""href="javascript:void(0);" >待发货</a>
                        </li>
                        <li id="torecv" class=" pzl_orderclick" >
                            <a title=""href="javascript:void(0);" >待收货</a>
                        </li>
                        <li id="todone"  class=" pzl_orderclick">
                            <a title="" href="javascript:void(0);" >待评价</a>
                        </li>
                    @elseif($name == 'topay')
                        <li id="allorder " class=" pzl_orderclick"><a
                                    title=""  href="javascript:void(0);">全部</a>
                        </li>
                        <li id="topay"   class="active pzl_orderclick">
                            <a title="" href="javascript:void(0);" >待付款</a>
                        </li>
                        <li id="tosend"  class=" pzl_orderclick">
                            <a title=""href="javascript:void(0);" >待发货</a>
                        </li>
                        <li id="torecv" class=" pzl_orderclick" >
                            <a title=""href="javascript:void(0);" >待收货</a>
                        </li>
                        <li id="todone"  class=" pzl_orderclick">
                            <a title="" href="javascript:void(0);" >待评价</a>
                        </li>
                    @elseif($name == 'tosend')
                        <li id="allorder " class=" pzl_orderclick"><a
                                    title=""  href="javascript:void(0);">全部</a>
                        </li>
                        <li id="topay"   class=" pzl_orderclick">
                            <a title="" href="javascript:void(0);" >待付款</a>
                        </li>
                        <li id="tosend"  class="active pzl_orderclick">
                            <a title=""href="javascript:void(0);" >待发货</a>
                        </li>
                        <li id="torecv" class=" pzl_orderclick" >
                            <a title=""href="javascript:void(0);" >待收货</a>
                        </li>
                        <li id="todone"  class=" pzl_orderclick">
                            <a title="" href="javascript:void(0);" >待评价</a>
                        </li>
                    @elseif($name == 'torecv')
                        <li id="allorder " class=" pzl_orderclick"><a
                                    title=""  href="javascript:void(0);">全部</a>
                        </li>
                        <li id="topay"   class=" pzl_orderclick">
                            <a title="" href="javascript:void(0);" >待付款</a>
                        </li>
                        <li id="tosend"  class=" pzl_orderclick">
                            <a title=""href="javascript:void(0);" >待发货</a>
                        </li>
                        <li id="torecv" class="active pzl_orderclick" >
                            <a title=""href="javascript:void(0);" >待收货</a>
                        </li>
                        <li id="todone"  class=" pzl_orderclick">
                            <a title="" href="javascript:void(0);" >待评价</a>
                        </li>
                    @elseif($name == 'todone')
                        <li id="allorder " class=" pzl_orderclick"><a
                                    title=""  href="javascript:void(0);">全部</a>
                        </li>
                        <li id="topay"   class=" pzl_orderclick">
                            <a title="" href="javascript:void(0);" >待付款</a>
                        </li>
                        <li id="tosend"  class=" pzl_orderclick">
                            <a title=""href="javascript:void(0);" >待发货</a>
                        </li>
                        <li id="torecv" class=" pzl_orderclick" >
                            <a title=""href="javascript:void(0);" >待收货</a>
                        </li>
                        <li id="todone"  class="active pzl_orderclick">
                            <a title="" href="javascript:void(0);" >待评价</a>
                        </li>
                    @endif

                </div>
            </ul>
            <input type="hidden" value="{{$member_id}}" class="myorder_memberid">
            <div class="item-list" id="container" rel="2" status="0">
                @if ($orders == '[]')

                    <div class="empty" style="margin-top: 40px;">
                        <center style="width:120px;margin:0 auto;"><img style="width:100%;padding-bottom:20px;" src="/images/order.png"></center>
                        <center style="padding-top:10px;"><span>您还没有相关订单，赶紧行动吧！</span></center>
                        <center style="width:100px;height:35px;margin: 60px auto 0;"><a href="/"><div style="width:100px;height:35px;background:#6a94e7;text-align:center;line-height:35px;border-radius: 3px;color:#fff;float:left;">随便逛逛</div></a></center>
                    </div>
                @else
                @foreach($orders as $order)
                <div class="list-group mb10">
                    <a href="/order_content/{{$order->id}}"class="list-group-item tip">
                    {{$order->order_no}}

                    <div  class="gary pull-right ">
                            @if($order->status == 1)
                             未支付
                            @elseif($order->status == 3)
                             已支付
                            @elseif($order->status == 4)
                            已发货
                            @elseif($order->status == 5 || $order->status == 6)
                            交易成功
                            @endif
                        </div>
                       
                    </a>
                    @foreach($order->order_items as $order_item)

                    <div id="pzl_detail" class="hproduct clearfix" style="background:#DDDDDD;border-top:0px;">
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
                        <br/>
                        @if($order->status == 1)
                            <button class="btn  mt5 mr5">取消订单</button>
                            <button class="btn btn-danger btn-buy mt5 mr5">付款</button>
                        @elseif($order->status == 3)
                            <button class="btn  mt5 mr5">删除订单</button>
                            <button class="btn btn-danger btn-buy mt5 mr5">提醒发货</button>
                        @elseif($order->status == 4)
                            <button class="btn  mt5 mr5">查看物流</button>
                            <button class="btn btn-danger btn-buy mt5 mr5">确认收货</button>
                        @elseif($order->status == 5)
                            <button class="btn  mt5 mr5">删除订单</button>
                            <button onclick="_toComment(this)" id="{{$order->id}}" class="btn btn-danger btn-buy mt5 mr5">评价</button>
                        @elseif($order->status == 6)
                            <button class="btn  mt5 mr5">删除订单</button>
                        @endif

                    </div>



                </div>
                    @endforeach
                   @endif
            </div>
            <div id="ajax_loading" style="display:none;width:300px;margin: 10px  auto 15px;text-align:center;">
                <img src="images/loading.gif">
            </div>


        </div>
    </div>

    <div class="clear"></div>




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
                    name = 'all';
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
                        $('#pzl_detail').html('');
                        if (data.orders == '')
                        {
                        var empty = '<div class="empty" style="margin-top: 40px;">'+
                                '<center style="width:120px;margin:0 auto;">'+'<img style="width:100%;padding-bottom:20px;" src="/images/order.png">'+'</center>'+
                                '<center style="padding-top:10px;">'+'<span>'+'您还没有相关订单，赶紧行动吧！'+'</span>'+'</center>'+
                        '<center style="width:100px;height:35px;margin: 60px auto 0;">'+'<a href="/">'+'<div style="width:100px;height:35px;background:#6a94e7;text-align:center;line-height:35px;border-radius: 3px;color:#fff;float:left;">'+'随便逛逛'+'</div>'+'</a>'+'</center>'+
                                '</div>';
                            $('#container').append(empty);
                        }
                        for(var i=0; i<data.orders.length; i++) {

                             if(data.orders[i].status == 1){
                                 var status = '未支付';
                                 var option =  '<button class="btn  mt5 mr5">'+'取消订单'+'</button>'+
                                         '<button class="btn btn-danger btn-buy mt5 mr5">'+'付款'+'</button>';
                             }else if (data.orders[i].status == 3){
                                 var status = '已支付';
                                 var option =  '<button class="btn  mt5 mr5">'+'删除订单'+'</button>'+
                                         '<button class="btn btn-danger btn-buy mt5 mr5">'+'提醒发货'+'</button>';
                             }else if (data.orders[i].status == 4){
                                 var status = '已发货';
                                 var option =  '<button class="btn  mt5 mr5">'+'查看物流'+'</button>'+
                                         '<button class="btn btn-danger btn-buy mt5 mr5">'+'确认收货'+'</button>';
                             }else if (data.orders[i].status == 5 ){
                                 var status = '交易成功';
                                 var option =  '<button class="btn  mt5 mr5">'+'删除订单'+'</button>'+
                                         '<button onclick="_toComment(this)" id=" '+data.orders[i].id+'" class="btn btn-danger btn-buy mt5 mr5">'+'评价'+'</button>';
                             }else if (data.orders[i].status == 6 ){
                                 var status = '交易成功';
                                 var option =  '<button class="btn  mt5 mr5">'+'删除订单'+'</button>';

                             }

                            var node =
                                    '<div class="list-group mb0">'+
                                    '<a href="#" class="list-group-item tip">'+
                                    data.orders[i].order_no+
                                    '<div  class="gary pull-right ">'+

                                    status+

                                    '</div>'+
                                    '</a>'+



                                    '</div>';

                            $('#container').append(node);

                            for (var j = 0; j<data.orders[i].order_items.length; j++){
                                var detail = '<div id="pzl_detail" class="hproduct clearfix" style="background:#DDDDDD;border-top:0px;">'+
                                        '<div class="p-pic">'+'<img style="max-height:100px;margin:auto;" class="img-responsive" src="'+data.orders[i].order_items[j].product.preview+'">'+'</div>'+
                                        '<div class="p-info">'+
                                        '<p class="p-title">'+data.orders[i].order_items[j].product.name+'</p>'+
                                        '<p >'+'</p>'+
                                        '<p class="p-origin">'+'<em class="price">'+'¥'+data.orders[i].order_items[j].product.price+'<span style="float: right">'+'x'+data.orders[i].order_items[j].count+'</span>'+'</em>'+
                                        '</p>'+
                                        '</div>'+
                                        '</div>';
                                $('#container').append(detail);

                            }
                            var foot =   '<div class="list-group-item mb10" style="color: #1b1b1b">'+
                                    '共'+data.orders[i].order_items.length+'商品&nbsp;合计：￥'+data.orders[i].total_price+
                                            '<br/>'+
                                    option+
                                    '</div>';
                            $('#container').append(foot);
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

        function _toComment(obj) {

            var order_id = $(obj).attr('id');
            var name = "{{$name}}";

            location.href = '/order_comment?order_id=' + order_id + '&name='+ name;
        }
    </script>

@endsection
