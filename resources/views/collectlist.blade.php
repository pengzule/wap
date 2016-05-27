@extends('default')

@section('title', '我的收藏')

@section('content')
    <div class="fanhui_cou">
        <div class="fanhui_1"></div>
        <div class="fanhui_ding">顶部</div>
    </div>
    <header class="header">
        <div class="fix_nav">
            <div class="nav_inner">
                <a class="nav-left back-icon" href="javascript:history.back();">返回</a>
                <div class="tit">收藏列表</div>
            </div>
        </div>
    </header>

    <div class="container" id="container2">
        <div class="row">
            @if($wishes !='[]')
            <div class="item-list" id="container" rel="2" status="0">
                @foreach($wishes as $wish)
                        <a href="/product/{{$wish->product->id}}">
                            <div class="hproduct clearfix" style="background:#fff;border-top:0px;">
                                <div class="p-pic"><img style="max-height:100px;margin:auto;" class="img-responsive" src="{{$wish->product->preview}}"></div>
                                <div class="p-info">
                                    <p class="p-title">{{$wish->product->name}}</p>
                                     <p ></p>
                                    <p class="p-origin"><em class="price">¥{{$wish->product->price}}</em>
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
            </div>
            @else
                <div class="empty" style="margin-top: 40px;">
                    <center style="width:120px;margin:0 auto;"><img style="width:100%;padding-bottom:20px;" src="/images/wish.jpg"></center>
                    <center style="padding-top:10px;"><span>您的收藏还是空的，赶紧行动吧！</span></center>
                    <center style="width:100px;height:35px;margin: 60px auto 0;"><a href="/"><div style="width:100px;height:35px;background:#6a94e7;text-align:center;line-height:35px;border-radius: 3px;color:#fff;float:left;">随便逛逛</div></a></center>
                </div>
            @endif
        </div>
    </div>


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
