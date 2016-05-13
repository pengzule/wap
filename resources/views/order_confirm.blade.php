@extends('default')

@section('title', '确认订单')

@section('content')

    <header class="header">
        <div class="fix_nav">
            <div class="nav_inner">
                <a class="nav-left back-icon" href="javascript:history.back();">返回</a>
                <div class="tit">确认订单</div>
            </div>
        </div>
    </header>
    <div class="container " id="container2">
        <div class="row">
    <div class="list-group mb10">
        <span href="#" class="list-group-item tip">

            <span style="float:left">收货人：彭祖乐</span>
            <span style="float:right">13338286204</span>
            <br/>
            <span style="font-size:80%; ">收货地址：福建省福州市仓山区福建农林大学</span>


        </a>

    </div>
    <div class="item-list" id="container" rel="2" status="0">
        <input type="hidden" id="ListTotal" value="1">
        @foreach($cart_items as $cart_item)
        <a href="/product/">
            <div class="hproduct clearfix" style="background:#fff;border-top:0px;">
                <div class="p-pic"><img style="max-height:100px;margin:auto;" class="img-responsive" src="{{$cart_item->product->preview}}"></div>
                <div class="p-info">
                    <p class="p-title">金钱猫EOC三合一局端CEH7140F </p>
                    <br/>
                    <p class="p-origin"><em class="price">¥200.00<span style="float: right">X10</span></em>
                    </p>
                </div>
            </div>
        </a>
        @endforeach

        <div class="list-group mb10">
            <a href="#" class="list-group-item tip">
                <div class="list_group_img"><img src="images/order_bg_10.png"></div>
                常见问题
            </a>

        </div>
    </div>
        </div>
    </div>
    <footer class="footer">
        <div class="fixed-foot">
            <div class="fixed_inner">
                <div class="pay-point">
                    <p>合计：<em class="red f22">¥<span >0</span></em></p>
                </div>
                <div class="buy-btn-fix">
                    <a href="javascript:;"  class="btn btn-danger btn-buy">确认</a>
                </div>
            </div>
        </div>
    </footer>

@endsection


