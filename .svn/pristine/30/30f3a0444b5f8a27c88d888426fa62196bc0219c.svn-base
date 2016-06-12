jQuery(document).ready(function() {



	// 详情数量减少
	$('.details_con .minus,.cart_count .minus').click(function(){
		var _index=$(this).parent().parent().index()-1;
		var _count=$(this).parent().find('.count');
		var _val=_count.val();
		if(_val>1){
			_count.val(_val-1);
			$('.details_con .selected span').eq(_index).text(_val-1);

		}
		if(_val<=2){
			$(this).addClass('disabled');
		}

	});

	// 详情数量添加
	$('.details_con .add,.cart_count .add').click(function(){
		var _index=$(this).parent().parent().index()-1;
		var _count=$(this).parent().find('.count');
		var _val=_count.val();
		$(this).parent().find('.minus').removeClass('disabled');
		_count.val(_val-0+1);
		$('.details_con .selected span').eq(_index).text(_val-0+1);

	});

	//绑定 点击事件
	$(".pzl_detail").bind("click",function() {
		var id = $(this).attr("id");
		var name = '';
		var product_id =$('.pzl_proddetail').val() ;
		$(".pzl_detail").each(function(i) {
			if (id != $(this).attr("id")) {
				$(this).removeClass("act");
			}
		});
		$(this).addClass("act");
		if (id == 'pzl_param') {
			name = 'summary';
		} else if (id == 'pzl_comment') {
			name = 'comment';
		}
		$.ajax({
			type: "GET",
			url: '/proddetail',
			dataType: 'json',
			cache: false,
			data: {name:name,product_id:product_id, _token: "{{csrf_token()}}"},
			success: function(data) {
				console.log("获取:");
				console.log(data);
				if(data == null) {
					$('.jqmkj_toptips').show();
					$('.jqmkj_toptips span').html('服务端错误');
					setTimeout(function() {$('.jqmkj_toptips').hide();}, 2000);
					return;
				}
				if(data.status == 1) {
					$('.desc-area').html('');

					var node =  '<div style="height:30px;">'+
							'<div id="" style="margin: 10px  auto 15px;text-align:left;">'+data.results +'</div>'+
							'</div>';
						$('.desc-area').append(node);

				}
				if(data.status == 2){
					$('.appraise').html('');
					for(var i=0; i<data.results.length; i++) {
						var node =
								'<div class="app-user mt5" >'+
								'<span class="user">'+data.results[i].name+'</span>'+
								'<span class="date">'+data.results[i].created_at+'</span>'+
								'</div>'+
								'<div class="app-cnt">'+data.results[i].comment+'</div>';

						$('.appraise').append(node);

						for (var j=0;j<data.results[i].images.length;j++){
							var img ='<img  src="'+data.results[i].images[j].image_path+'" class="img_upload"  />';
							$('.appraise').append(img);
						}
						var foot =
								'<li>';
						$('.appraise').append(foot);
					}

				}

			},
			error: function(xhr, status, error) {
				console.log(xhr);
				console.log(status);
				console.log(error);
			}
		});
	});
});




