@extends('default')

@section('title', '我的设备')

@section('content')
    <div class="fanhui_cou">
        <div class="fanhui_1"></div>
        <div class="fanhui_ding">顶部</div>
    </div>
    <header class="header">
        <div class="fix_nav">
            <div class="nav_inner">
                <a class="nav-left back-icon" href="javascript:history.back();">返回</a>
                <div class="tit">我的设备</div>
            </div>
        </div>
    </header>

    <div class="container" id="container2">
        <div class="row">


        </div>
    </div>


    <div class="clear"></div>

    <!--
      <div class="foot_index">

      </div>
      -->
    <footer class="footer">
        <div class="foot-con">
            <div class="foot-con_2">
                <a href="/home" >
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
