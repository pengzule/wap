@extends('default')

@section('title', '商品列表')

@section('content')
    <div class="fanhui_cou">
        <div class="fanhui_1"></div>
        <div class="fanhui_ding">顶部</div>
    </div>
    <header class="header">
        <div class="fix_nav">
            <div class="nav_inner">
                <a class="nav-left back-icon" href="javascript:history.back();">返回</a>
                <div class="tit">产品列表</div>
            </div>
        </div>
    </header>

    <div class="container" id="container2">
        <div class="row">
            @if($category_id != '')
                <input type="hidden" class="pzl_category" value="{{$category_id}}">
            @elseif($keyword != '')
                <input type="hidden" class="pzl_keyword" value="{{$keyword}}">
            @endif
            <ul  class="mod-filter clearfix">
                <div class="white-bg_2 bb1">

                    <li id="default" class="active pzl_product"><a
                                title="默认排序"  href="javascript:void(0);">默认</a></li>
                    <li id="buys"   class=" pzl_product"><a title="点击按销量从高到低排序"
                                       href="javascript:void(0);" >销量
                            <i class='icon_sort'></i>
                        </a></li>
                    <li id="comments" class=" pzl_product"  ><a title="点击按评论数从高到低排序"
                                           href="javascript:void(0);" >评论数
                            <i class='icon_sort'></i>
                        </a></li>
                    <li id="cash"  class=" pzl_product"><a title="点击按价格从高到低排序"
                                       href="javascript:void(0);" >价格
                            <i class='icon_sort'></i>
                        </a></li>
                </div>
            </ul>
            @if($products !='[]')
            <div class="item-list" id="container" rel="2" status="0">
            <input type="hidden" id="ListTotal" value="1">

                    @foreach($products as $product)
                        <a href="/product/{{$product->id}}">
                            <div class="hproduct clearfix" style="background:#fff;border-top:0px;">
                                <div class="p-pic"><img style="max-height:100px;margin:auto;" class="img-responsive" src="{{$product->preview}}"></div>
                                <div class="p-info">
                                    <p class="p-title">{{$product->name}}</p>
                                     <p ></p>
                                    <p class="p-origin"><em class="price">¥{{$product->price}}</em>
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach

            </div>
            @else

                没有找到符合条件的商品
            @endif
            <div id="ajax_loading" style="display:none;width:300px;margin: 10px  auto 15px;text-align:center;">
                <img src="/images/loading.gif">
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
                <a class="active" href="/category">
                    <i class="navIcon sort"></i>
                    <span class="text">分类</span>
                </a>
                <a href="/cart">
                    <i class="navIcon shop"></i>
                    <span class="text">购物车</span>
                </a>
                <a href="/userhome">
                    <i class="navIcon member"></i>
                    <span class="text">我的</span>
                </a>
            </div>
        </div>
    </footer>


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
