$(document).ready(function(){
	//返回顶部
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

	//勾选
	$(".checkLabel").click(function(){
		var flag = $(this).prev().is(':checked');
		if(flag){
			$(this).prev().attr("checked",false);

			$("#buy-sele-all").attr("checked", false); //将全选勾除
			$("#buy-sele-all").val(0);

		}else{

			$(this).prev().attr("checked",true);

			//如果全部都选中了，将全选勾选
			var groupUL = $(".container").find("ul[class='list-group']").get();
			var checkUL = $(".container").find("div[class='icheck pull-left mr5'] :checkbox:checked").get();
			if(groupUL.length == checkUL.length){
				$("#buy-sele-all").attr("checked", true);
				$("#buy-sele-all").val(1);
			}
		}

		//计算总价
		calculateTotal();
	});

	// 全选，全不选
	$("#buy-sele-all").click(function() {
		var flag = $(this).val();

		if(flag ==1){
			$(this).val(0);
			$(".ids").attr("checked", false);
		}else{
			$(this).val(1);
			$(".ids").attr("checked", true);
		}

		//计算总价
		calculateTotal();
	});

	//计算总价
	//  calculateTotal();
});

//相加
function increase(obj){
	var _this = $(obj);
	var _count_obj=_this.prev();
	var count =Number($(_count_obj).val());
	var basket_id=$(_count_obj).attr("itemkey");
	var prod_id=$(_count_obj).attr("prodId");
	var sku_id=$(_count_obj).attr("skuId");

	var _num=parseInt(count)+1;
	var re = /^[1-9]+[0-9]*]*$/;
	if( isNaN(_num) || ! re.test(_num)) {
		return ;
	}else if(_num==9999){
		return;
	}

	var result = true;
	if(result){
		$(_count_obj).val(count*1+1);
		var cash = $(_this).parent().parent().prev().find("em[class='price']").html().substring(1);//单价
		var total_cash =  $(_this).parent().prev().find("em[class='red productTotalPrice']").html().substring(1);//商品小计

		var e_cash = Math.round((Number(total_cash)+Number(cash))*100)/100;
		var pos_decimal = e_cash.toString().indexOf('.');
		if (pos_decimal < 0)
		{
			e_cash += '.00';
		}
		$(_this).parent().prev().find("em").html("¥"+e_cash);

		//计算总价
		calculateTotal();
		$.ajax({
			type: "GET",
			url: '/service/cart/add/',
			dataType: 'json',
			cache: false,
			data: { product_id:basket_id,_token: "{{csrf_token()}}"},
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


			},
			error: function(xhr, status, error) {
				console.log(xhr);
				console.log(status);
				console.log(error);
			}
		});
	}

}

//减
function disDe(obj){
	var _this = $(obj);
	var _count_obj=_this.next();
	var count =Number($(_count_obj).val());
	var basket_id=$(_count_obj).attr("itemkey");
	var prod_id=$(_count_obj).attr("prodId");
	var sku_id=$(_count_obj).attr("skuId");
	var _num=parseInt(count)-1;

	var re = /^[1-9]+[0-9]*]*$/;
	if( isNaN(_num) || ! re.test(_num)) {
		return ;
	}else if(_num==0){
		return ;
	}
	var result = true;
	if(result){
		$(_count_obj).val(count*1-1);
		var cash = $(_this).parent().parent().prev().find("em[class='price']").html().substring(1);//单价
		var total_cash =  $(_this).parent().prev().find("em[class='red productTotalPrice']").html().substring(1);//商品小计
		var e_cash = Math.round((Number(total_cash)-Number(cash))*100)/100;
		var pos_decimal = e_cash.toString().indexOf('.');
		if (pos_decimal < 0)
		{
			e_cash += '.00';
		}
		$(_this).parent().prev().find("em").html("¥"+e_cash);

		//计算总价
		calculateTotal();
		$.ajax({
			type: "GET",
			url: '/service/cart/reduce/',
			dataType: 'json',
			cache: false,
			data: { product_id:basket_id,_token: "{{csrf_token()}}"},
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

			},
			error: function(xhr, status, error) {
				console.log(xhr);
				console.log(status);
				console.log(error);
			}
		});
	}
}

//计算总价
function calculateTotal(){
	var allCash = 0;
	var list = $(".container").find("ul[class='list-group']").get();
	for(var i=0;i<list.length;i++){
		var selected = $(list[i]).find("div[class='icheck pull-left mr5']>:checkbox").is(":checked");
		if(selected){
			var cash = $(list[i]).find("em[class='price']").html().substring(1);//取单价
			var count = $(list[i]).find("input[class='btn gary2 Amount']").val();//取数量
			allCash += Number(cash)*Number(count);
		}
	}

	allCash = Math.round(Number(allCash)*100)/100;
	var pos_decimal = allCash.toString().indexOf('.');
	if (pos_decimal < 0)
	{
		allCash += '.00';
	}
	$("#totalPrice").html(allCash);
}

//删除购物车商品
function _deleteShopCart(_basketName,_prodId){
	if(confirm("删除后不可恢复, 确定要删除'"+_basketName+"'吗？")){
		$.ajax({
			type: "GET",
			url: '/service/cart/delete',
			dataType: 'json',
			cache: false,
			data: {product_ids: _prodId+''},
			success: function(data) {
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

				location.reload();
			},
			error: function(xhr, status, error) {
				console.log(xhr);
				console.log(status);
				console.log(error);
			}
		});
	}
}



