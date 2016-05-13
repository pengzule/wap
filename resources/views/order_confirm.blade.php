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
        <a href="/editaddress" class="list-group-item tip">

            <span style="float:left">收货人：彭祖乐</span>
            <span style="float:right">13338286204</span>
            <br/>
            <span style="font-size:80%; ">收货地址：福建省福州市仓山区福建农林大学</span>


        </a>

    </div>
    <div class="item-list" id="container" rel="2" status="0">
        <input type="hidden" id="ListTotal" value="1">
        @foreach($cart_items as $cart_item)
        <input type="hidden" name="cart_item" id="{{$cart_item->product->id}}" >
        <a href="/product/">
            <div class="hproduct clearfix" style="background:#fff;border-top:0px;">
                <div class="p-pic"><img style="max-height:100px;margin:auto;" class="img-responsive" src="{{$cart_item->product->preview}}"></div>
                <div class="p-info">
                    <p class="p-title">金钱猫EOC三合一局端CEH7140F </p>
                    <br/>
                    <p class="p-origin"><em class="price">¥{{$cart_item->product->price}}<span style="float: right">x{{$cart_item->count}}</span></em>
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
                    <p>合计：<em class="red f22">¥<span >{{$total_price}}</span></em></p>
                </div>
                <div class="buy-btn-fix">
                    <a href="javascript:;"  onclick="_toCharge()" class="btn btn-danger btn-buy">确认</a>
                </div>
            </div>
        </div>
    </footer>

@endsection


@section('my-js')
    <script type="text/javascript">
        function selectAll(){
            var a = document.getElementsByTagName("input");
            if(a[0].checked){
                for(var i = 0;i<a.length;i++){
                    if(a[i].type == "checkbox") a[i].checked = false;
                }
            }
            else{
                for(var i = 0;i<a.length;i++){
                    if(a[i].type == "checkbox") a[i].checked = true;
                }
            }
        }
        $(function(){
            $('.pzl_nav').posfixed({
                distance : 0,
                pos : 'top',
                type : 'while',
                hide : false
            });

            $('.gotop').posfixed({
                distance : 10,
                direction : 'bottom',
                type : 'always',
                tag : {
                    obj : $('.wrap'),
                    direction : 'right',
                    distance : 10
                },
                hide : true
            });
        });



        function _toCharge() {
            var product_ids_arr = [];
            $("input[type='hidden'][name='cart_item']").each(function () {
                product_ids_arr.push($(this).attr('id'));
            });

            if(product_ids_arr.length == 0) {
                alert('请选择提交项');
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



    </script>


@endsection
