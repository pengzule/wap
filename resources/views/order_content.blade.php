@extends('default')

@section('title', '订单详情')

@section('content')
    <div class="fanhui_cou">
        <div class="fanhui_1"></div>
        <div class="fanhui_ding">顶部</div>
    </div>
    <header class="header">
        <div class="fix_nav">
            <div class="nav_inner">
                <a class="nav-left back-icon" href="javascript:history.back();">返回</a>
                <div class="tit">订单详情</div>
            </div>
        </div>
    </header>

    <div class="container" id="container2">

        <div class="row">

            <input type="hidden" value="" class="myorder_memberid">
            <div class="item-list" id="container" rel="2" status="0">
                <div class="list-group mb10">
                    <a href="#" onclick ="_toselectaddress();" class="list-group-item ">
                        <span style="float:left">收货人：{{$order->realname}}</span>
                        <span style="float:right">{{$order->phone}}</span>
                        <br/>
                        <span style="font-size:80%; ">收货地址：{{$order->address}}</span>
                    </a>
                </div>
                <div class="list-group mb10">
                    <a href="#" class="list-group-item tip">
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
                    @foreach($order_items as $order_item)
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
                        实付款（含运费）

                       <span style="float: right;"class="price">￥{{$order->total_price}}</span>
                    </div>
                </div>
            </div>
            <div id="ajax_loading" style="display:none;width:300px;margin: 10px  auto 15px;text-align:center;">
                <img src="images/loading.gif">
            </div>


        </div>
    </div>
    <footer class="footer">
        <div class="fixed-foot">
            <div class="fixed_inner">

                <div class="buy-btn-fix">
                    @if($order->status == 1)
                        <button class="btn   mr5">取消订单</button>
                        <button class="btn btn-danger btn-buy  mr5">付款</button>
                    @elseif($order->status == 3)
                        <button class="btn   mr5">删除订单</button>
                        <button class="btn btn-danger btn-buy  mr5">提醒发货</button>
                    @elseif($order->status == 4)
                        <button class="btn   mr5">查看物流</button>
                        <button class="btn btn-danger btn-buy  mr5">确认收货</button>
                    @elseif($order->status == 5)
                        <button class="btn   mr5">删除订单</button>
                        <button onclick="_toComment(this)" id="{{$order->id}}" class="btn btn-danger btn-buy  mr5">评价</button>
                    @elseif($order->status == 6)
                        <button class="btn   mr5">删除订单</button>
                    @endif
                </div>
            </div>
        </div>
    </footer>
    <div class="clear"></div>




@endsection

@section('my-js')


@endsection
