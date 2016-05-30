@extends('default')

@section('title', '发表评价')

@section('content')
    <div class="fanhui_cou">
        <div class="fanhui_1"></div>
        <div class="fanhui_ding">顶部</div>
    </div>
    <header class="header">
        <div class="fix_nav">
            <div class="nav_inner">
                <a class="nav-left back-icon" href="javascript:history.back();">返回</a>
                <div class="tit">发表评价</div>
            </div>
        </div>
    </header>

    <div class="container" id="container2">
        <div class="row">
            <div class="item-list" id="container" rel="2" status="0">
                @foreach($orders as $order)
                @foreach($order->$cart_items as $cart_item)
                        <a href="/product/{{$cart_item->product->id}}">
                            <div class="hproduct clearfix" style="background:#fff;border-top:0px;">
                                <div class="p-pic"><img style="max-height:100px;margin:auto;" class="img-responsive" src="{{$cart_item->product->preview}}"></div>
                                <div class="p-info">
                                    <p class="p-title">{{$cart_item->product->name}}</p>


                                </div>
                            </div>
                        </a>
                    @endforeach
                    @endforeach
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="fixed-foot">
            <div class="fixed_inner">

                <div class="buy-btn-fix">
                    <a href="javascript:;" onclick="" class="btn btn-danger btn-buy">发表评价</a>
                </div>
            </div>
        </div>
    </footer>
    <div class="clear"></div>





@endsection

@section('my-js')
    <script type="text/javascript">



    </script>

@endsection
