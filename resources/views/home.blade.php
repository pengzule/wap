@extends('default')

@section('title', '首页')

@section('content')


    <header class="header">
        <div class="fix_nav">
            <div style="max-width:768px;margin:0 auto;height: 44px;position: relative;background:#000000;">
                <form action="/m_search/list" method="get" id="searchform" name="searchform">
                    <div class="navbar-search left-search">
                        <input type="text" id="keyword" name="keyword" value="" placeholder="搜索商品" class="form-control">
                    </div>
                    <div class="nav-right">
                        <input type="button" value="搜索" onclick="searchproduct();" class="img-responsive" style="text-align:center;background:#ccc;border-radius: 5px;border:none;height:34px;vertical-align:middle;clear:both;padding:0px;width:42px;"/>
                    </div>
                </form>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div id="slide">
                <div class="hd">
                    <ul><li class="on">1</li><li class="on">2</li><li class="on">3</li></ul>
                </div>
                <div class="bd">
                    <div class="tempWrap" style="overflow:hidden; position:relative;">
                        <ul style="width: 3840px; position: relative; overflow: hidden; padding: 0px; margin: 0px; transition-duration: 200ms; transform: translateX(-768px);">
                            <li style="display: table-cell; vertical-align: top; width: 768px;">
                                <a href="#" target="_blank">
                                    <img src="/img/1.jpg" alt="EOC" ppsrc="/img/1.jpg">
                                </a>
                            </li>
                            <li style="display: table-cell; vertical-align: top; width: 768px;">
                                <a href="#" target="_blank">
                                    <img src="/img/2.jpg" alt="EOC" ppsrc="/img/2.jpg">
                                </a>
                            </li>
                            <li style="display: table-cell; vertical-align: top; width: 768px;">
                                <a href="#" target="_blank">
                                    <img src="/img/3.jpg" alt="EOC" ppsrc="/img/3.jpg">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script charset="utf-8" src="/js/TouchSlide.js"></script>

        <script type="text/javascript">

            TouchSlide({
                slideCell:"#slide",
                titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
                mainCell:".bd ul",
                effect:"left",
                autoPlay:true,//自动播放
                autoPage:true, //自动分页
                switchLoad:"_src" //切换加载，真实图片路径为"_src"
            });
        </script>


        <div class="row category">
            <a href="#" class="col-xs-3">
                <img class="img-responsive" src="/img/icon_rm.png">
                <h4>热门</h4>
            </a>
            <a href="#" class="col-xs-3">
                <img class="img-responsive" src="/img/icon_tm.png">
                <h4>精品</h4>
            </a>
            <a href="#" class="col-xs-3">
                <img class="img-responsive" src="/img/theme.png">
                <h4>专题列表</h4>
            </a>
            <a href="#" class="col-xs-3">
                <img class="img-responsive" src="/img/icon_pp.png">
                <h4>品牌</h4>
            </a>
        </div>

        <div class="row">

            <!--产品块-->
            <div class="tb_box">
                <h2 class="tab_tit">
                    <a class="more" href="#">更多</a>
                    EOC设备</h2>

                <div class="tb_type tb_type_even clearfix"><a class="tb_floor" href="#">
                        <img src="/img/plc.jpg" style="width:100%;">
                    </a>
                    <a class="th_link" href="#">
                        <img class="tb_pic" src="/img/MT706W.jpg" style="width:100%;">
                    </a>
                    <a class="th_link tb_last" href="#">
                        <img class="tb_pic" src="/img/MT706R.jpg" style="width:100%;">
                    </a>
                </div>
            </div>
            <!--产品块-->
            <div class="tb_box">
                <h2 class="tab_tit">
                    <a class="more" href="#">更多</a>
                    EPON设备</h2>

                <div class="tb_type clearfix"><a class="tb_floor" href="#">
                        <img src="/img/plc.jpg" style="width:100%;">
                    </a>
                    <a class="th_link" href="#">
                        <img class="tb_pic" src="/img/MT706W.jpg" style="width:100%;">
                    </a>
                    <a class="th_link tb_last" href="#">
                        <img class="tb_pic" src="/img/MT706R.jpg" style="width:100%;">
                    </a>
                </div>
            </div>
            <!--产品块-->
            <div class="tb_box">
                <h2 class="tab_tit">
                    <a class="more" href="#">更多</a>
                   入户光终端</h2>

                <div class="tb_type tb_type_even clearfix"><a class="tb_floor" href="#">
                        <img src="/img/plc.jpg" style="width:100%;">
                    </a>
                    <a class="th_link" href="#">
                        <img class="tb_pic" src="/img/MT706W.jpg" style="width:100%;">
                    </a>
                    <a class="th_link tb_last" href="#">
                        <img class="tb_pic" src="/img/MT706R.jpg" style="width:100%;">
                    </a>
                </div>
            </div>
        </div>

    </div>
    <!--
    <div class="foot_index">
        <div class="foot_index_tit">Aim Beauty Limited(HongKong)</div>
        <div class="foot_index_rx">服务热线：020-87774389</div>
    </div>
    -->
    <footer class="footer">
        <div class="foot-con">
            <div class="foot-con_2">
                <a href="/home" class="active">
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
                <a href="/userhome" >
                    <i class="navIcon member"></i>
                    <span class="text">我的</span>
                </a>
            </div>
        </div>
    </footer>


@endsection

@section('my-js')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#slide img").each(function(){
                var img_src=$(this).attr("_src");
                $(this).attr("src",img_src);
            });
        });

        function searchproduct(){
            var keyword = document.getElementById("keyword").value;
            if(keyword == undefined || keyword==null ||keyword ==""){
                alert("请输入搜索关键字！");
                return false;
            }
            document.getElementById("searchform").submit();
        }
    </script>

@endsection