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
                @foreach($order_items as $order_item)
                    <input type="hidden" name="product_id" value="{{$order_item->product->id}}">
                            <div class="hproduct clearfix" style="background:#fff;border-top:0px;">
                                <div class="p-pic"><img style="max-height:100px;margin:auto;" class="img-responsive" src="{{$order_item->product->preview}}"></div>
                                <div class="order_comment">
                                   <textarea  name="comment" rows="5" class=" pzl_textarea form-control" value="" placeholder="输入评价"></textarea>
                                </div>
                                <div class="mt5">
                                    <img id="preview_id1" src="/admin/images/icon-add.png" class="img_upload" onclick="_onpppp(this);" />
                                    <input type="file" name="file" id="input_id1" style="display: none;" onchange="return uploadImageToServer( this);" />
                                    <img id="preview_id2" src="/admin/images/icon-add.png" class="img_upload" onclick="$('#input_id2').click()" />
                                    <input type="file" name="file" id="input_id2" style="display: none;" onchange="return uploadImageToServer('input_id2','images', 'preview_id2');" />
                                    <img id="preview_id3" src="/admin/images/icon-add.png" class="img_upload" onclick="$('#input_id3').click()" />
                                    <input type="file" name="file" id="input_id3" style="display: none;" onchange="return uploadImageToServer('input_id3','images', 'preview_id3');" />
                                    <img id="preview_id4" src="/admin/images/icon-add.png" class="img_upload" onclick="$('#input_id4').click()" />
                                    <input type="file" name="file" id="input_id4" style="display: none;" onchange="return uploadImageToServer('input_id4','images', 'preview_id4');" />
                                    <img id="preview_id5" src="/admin/images/icon-add.png" class="img_upload" onclick="$('#input_id5').click()" />
                                    <input type="file" name="file" id="input_id5" style="display: none;" onchange="return uploadImageToServer('input_id5','images', 'preview_id5');" />
                                </div>
                            </div>
                    @endforeach
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="fixed-foot">
            <div class="fixed_inner">

                <div class="buy-btn-fix">
                    <a href="javascript:;" onclick="_onComment(this)" id="{{$order_id}}" class="btn btn-danger btn-buy">发表评价</a>
                </div>
            </div>
        </div>
    </footer>
    <div class="clear"></div>





@endsection

@section('my-js')
    <script type="text/javascript">
    function  _onpppp(obj){
        var _this = $(obj);
        var _count_obj=_this.next();
        var id = $(_count_obj).attr('id');
        $(id).click();
    }
        function _onComment(obj) {
            var order_id = $(obj).attr('id');
            var name = "{{$name}}";
            var product_ids_arr = [];
            var comments_arr = [];
            var preview1_arr = [];
            var preview2_arr = [];
            var preview3_arr = [];
            var preview4_arr = [];
            var preview5_arr = [];
            $('input:hidden[name=product_id]').each(function(index, el) {
                product_ids_arr.push($(this).val());
            });
            $(' .pzl_textarea').each(function(index, el) {
                comments_arr.push($(this).val());
            });
            $(' #preview_id1').each(function(index, el) {
                preview1_arr.push(($('#preview_id1').attr('src')!='/admin/images/icon-add.png'?$('#preview_id1').attr('src'):''));
            });
            $(' #preview_id2').each(function(index, el) {
                preview2_arr.push(($('#preview_id2').attr('src')!='/admin/images/icon-add.png'?$('#preview_id2').attr('src'):''));
            });
            $(' #preview_id3').each(function(index, el) {
                preview3_arr.push(($('#preview_id3').attr('src')!='/admin/images/icon-add.png'?$('#preview_id3').attr('src'):''));
            });
            $(' #preview_id4').each(function(index, el) {
                preview4_arr.push(($('#preview_id4').attr('src')!='/admin/images/icon-add.png'?$('#preview_id4').attr('src'):''));
            });
            $(' #preview_id5').each(function(index, el) {
                preview5_arr.push(($('#preview_id5').attr('src')!='/admin/images/icon-add.png'?$('#preview_id5').attr('src'):''));
            });


            $.ajax({
                type: "post",
                url: '/sumbit_comment',
                dataType: 'json',
                cache: false,
                data: {
                    order_id:order_id,
                    product_ids:product_ids_arr,
                    comments: comments_arr,
                    preview1: preview1_arr,
                    preview2: preview2_arr,
                    preview3: preview3_arr,
                    preview4: preview4_arr,
                    preview5: preview5_arr,
                    _token: "{{csrf_token()}}"
                },
                success: function(data) {
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

                    location.href = '/order_list?name=' + name;
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
