@extends('default')

@section('title', '分类')

@section('content')
    <header class="header">
        <div class="fix_nav">
            <div class="nav_inner">
                <a class="nav-left back-icon" href="javascript:history.go(-1);">返回</a>
                <div class="tit">分类</div>
                <div class="sousuo" id="sousou"><img src="images/sou.png"></div>
            </div>
        </div>
    </header>
    <div style="overflow: hidden;position: fixed;width: 100%;z-index: 10000;top:0px;">
        <div class="order_top_count" style="display:none;">
            <div class="order_top">
                <div class="order_a_l">
                    <div id="nav-left_ll"><img src="images/order_top_l.png"></div>
                </div>
                <div class="order_sou">
                    <form action="/m_search/list" method="get" id="searchform" name="searchform">
                        <input name="keyword" id="keyword" placeholder="搜索商品" type="text" value="">
                        <span class="pro_sou" style="cursor: pointer;" onclick="searchproduct();"><img src="images/Search.png"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row" id="row_5">
            <div class="sort-arat" style="margin-top: 10px;">
                <ul>
                    @foreach ($categorys as $category)
                    <li>
                        <a href="/product/category_id/{{$category->id}}">
                            <img alt="图片大小为100*100" style="width:initial;height:100px;" src="{{$category->preview}}" >
                            <div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">{{$category->name}}</div>
                        </a>
                    </li>
                   @endforeach

            </div>


        </div>
    </div>

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
