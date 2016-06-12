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
                <div class="tit">选择收货地址</div>
            </div>
        </div>
    </header>

    <div class="container" >
        <div class="row">
            @if ($addresses != '')

                <div class="list-group mb10">
                    @foreach($addresses as $address)
                    <a href="#"  id="{{$address->id}}" class="list-group-item tip selectaddr">
                        <span style="float:left">收货人：{{$address->realname}}</span>
                        <span style="float:right">{{$address->phone}}</span>
                        <br/>
                        <span style="font-size:80%; ">收货地址：{{$address->province}}{{$address->city}}{{$address->county}}{{$address->street}}</span>
                    </a>
                    @endforeach
                </div>

            @else
                <div class="list-group mb10">
                    <a href="/editaddress" class="list-group-item tip">
                        选择收货地址
                    </a>
                </div>
            @endif

        </div>
    </div>

    <footer class="footer">
        <div class="fixed-foot2">
            <a href="/editaddress"> <div class="fixed_exit tit">
                    <div class="tit">管理收货地址</div>
                </div>
            </a>
        </div>
    </footer>
    <div class="clear"></div>





@endsection

@section('my-js')
    <script type="text/javascript">
        $(".selectaddr").bind("click",function(){
            var id = $(this).attr("id");
            var product_ids_arr = "{{$product_ids}}";
            $.ajax({
                type: "POST",
                url: '/service/selectaddress',
                dataType: 'json',
                cache: false,
                data: {id:id, _token: "{{csrf_token()}}"},
                success: function(data) {
                    if(data == null) {
                        $('.jqmkj_toptips').show();
                        $('.jqmkj_toptips span').html('服务端错误');
                        setTimeout(function() {$('.jqmkj_toptips').hide();}, 2000);
                        return;
                    }
                    if(data.status != 0) {
                        $('.jqmkj_toptips').show();
                        $('.jqmkj_toptips span').html(data.message);
                        setTimeout(function() {$('.jqmkj_toptips').hide();}, 2000);
                        return;
                    }
                    location.href = '/order_confirm?product_ids=' + product_ids_arr;
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });

        });



    </script>

@endsection
