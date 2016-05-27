jQuery(document).ready(function() {
	
	sendData();//一过来就调用
	
	$(window).scroll(function(){
		if($(this).scrollTop()>300){
			$(".fanhui_cou").fadeIn(1500);

		}else{
			$(".fanhui_cou").fadeOut(1500);

		}
	});
	$(".fanhui_cou").click(function(){
		$("body,html").animate({scrollTop:0},200);
		return false;
	});

	$(window).scroll(function(){
        if ($(document).height() - $(this).scrollTop() - $(this).height()<50){

        	var curPageNo = $("#curPageNO").val();
        	if(isBlank(curPageNo) || curPageNo == 0){
        		curPageNo = 1;
        	}

        	curPageNo=parseInt(curPageNo)+1;
			var totalPage=parseInt($("#ListTotal").val());
			if(curPageNo<=totalPage){
				$("#curPageNO").val(curPageNo);
				appendData();
			}
        }
    });


	//绑定 点击事件
	$(".pzl_product").bind("click",function() {
		var id = $(this).attr("id");
		var category_id = $('.pzl_category').val();
		var keyword = $('.pzl_keyword').val();
		var orderDir = '';
		var name = '';
		$(".pzl_product").each(function(i) {
			if (id != $(this).attr("id")) {
				$(this).removeClass("active");
			}
		});
		$(this).addClass("active");
		var iElement=$(this).find("i");
		if (id == 'cash') {
			name = 'price';
			if ($(iElement).hasClass("icon_sort_up")) {

				orderDir = "asc";
				$(iElement).attr("class","icon_sort_down");

			} else if($(iElement).hasClass("icon_sort_down")){
				orderDir = "desc";
				$(iElement).attr("class","icon_sort_up");

			}else{
				orderDir = "desc";
				$(iElement).attr("class","icon_sort_up");
			}
		} else if (id == 'buys') {
			name = 'sale_count';
			if ($(iElement).hasClass("icon_sort_down")) {
				orderDir = "desc";
				$(iElement).attr("class","icon_sort_up");

			} else if($(iElement).hasClass("icon_sort_up")){
				orderDir = "asc";
				$(iElement).attr("class","icon_sort_down");

			}else{
				orderDir = "desc";
				$(iElement).attr("class","icon_sort_up");
			}
		} else if (id == 'comments') {
			name = 'comment_count';
			if ($(iElement).hasClass("icon_sort_down")) {
				orderDir = "desc";
				$(iElement).attr("class","icon_sort_up");

			} else if($(iElement).hasClass("icon_sort_up")){
				orderDir = "asc";
				$(iElement).attr("class","icon_sort_down");

			}else{
				orderDir = "desc";
				$(iElement).attr("class","icon_sort_up");
			}
		}else if (id == 'default'){
			name = 'id';
			orderDir = 'asc';
		}
		$.ajax({
			type: "GET",
			url: '/prodsort',
			dataType: 'json',
			cache: false,
			data: {category_id:category_id,keyword:keyword,name:name,orderDir:orderDir, _token: "{{csrf_token()}}"},
			success: function(data) {
				console.log("获取:");
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

				$('#container').html('');
				for(var i=0; i<data.products.length; i++) {


					var next = '/product/' + data.products[i].id;
					var node = '<a href="' + next + '">'+
							'<div class="hproduct clearfix" style="background:#fff;border-top:0px;">'+
							'<div class="p-pic"><img style="max-height:100px;margin:auto;" class="img-responsive" src="'+data.products[i].preview+'">'+'</div>'+
							'<div class="p-info">'+
							'<p class="p-title">'+data.products[i].name+'</p>'+
					'<p>'+'</p>'+
					'<p class="p-origin">'+'<em class="price">'+'¥'+data.products[i].price+'</em>'+
					'</p>'+
					'</div>'+
					'</div>'+
					'</a>';

					$('#container').append(node);
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

function sendData(){
	/*$('#ajax_loading').show();
	$("#list_form").ajaxForm().ajaxSubmit({
		  success:function(result) {
			 $('#ajax_loading').hide();
			 $("#container").html(result);
		   },
		   error:function(XMLHttpRequest, textStatus,errorThrown) {
			 $("#container").html("");
			 $('#ajax_loading').hide();
			 floatNotify.simple("查找失败");
			 return false;
		  }
	})*/
}

function appendData(){
	/*$('#ajax_loading').show();
	$("#list_form").ajaxForm().ajaxSubmit({
		  success:function(result) {
			 $('#ajax_loading').hide();
			 $("#container").append(result);
		   },
		   error:function(XMLHttpRequest, textStatus,errorThrown) {
			 $("#container").html("");
			 $('#ajax_loading').hide();
			 floatNotify.simple("查找失败");
			 return false;
		  }
	});*/
}

/**判断是否为空**/
function isBlank(_value){
	if(_value==null || _value=="" || _value==undefined){
		return true;
	}
	return false;
}