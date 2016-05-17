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
                <div class="tit">收货地址</div>
            </div>
        </div>
    </header>

    <div class="container" >
        <div class="row">
            @if ($addresses != '')

                <div class="list-group mb10">
                    @foreach($addresses as $address)
                    <a href="/editaddress" class="list-group-item tip">
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
                    <div class="tit">新增收货地址</div>
                </div>
            </a>
        </div>
    </footer>
    <div class="clear"></div>





@endsection

@section('my-js')
    <script type="text/javascript">

        _getCategory();

        $('.weui_select').change(function(event) {
            _getCategory()
        });

        function _getCategory() {
            var parent_id = $('.weui_select option:selected').val();
            console.log('parent_id: ' + parent_id);
            $.ajax({
                type: "GET",
                url: '/service/category/parent_id/' + parent_id,
                dataType: 'json',
                cache: false,
                success: function(data) {
                    console.log("获取类别数据:");
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
                    $('.weui_cells_access').html('');
                    for(var i=0; i<data.categorys.length; i++) {
                        var next = '/product/category_id/' + data.categorys[i].id;
                        var node = '<a class="weui_cell" href="' + next + '">' +
                                '<div class="weui_cell_bd weui_cell_primary">' +
                                '<p>'+ data.categorys[i].name +'</p>' +
                                '</div>' +
                                '<div class="weui_cell_ft"></div>' +
                                '</a>';
                        $('.weui_cells_access').append(node);
                    }
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
