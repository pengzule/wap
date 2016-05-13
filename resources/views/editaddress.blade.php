@extends('address')



@section('title', '填写收货信息')

@section('content')

<div id="container"><div class="page_topbar">
        <a  class="back" href="javascript:history.back();"><i class="fa fa-angle-left"></i></a>
        <div class="title">填写收货信息</div>
    </div>
    
<div id="container">
    <div class="address_main">
        <input type="hidden" id="addressid" value="">
		<input type="hidden" id="spuid" value="3074">
        <div class="line"><input type="text" placeholder="收件人" id="realname" value=""></div>
        <div class="line"><input type="text" placeholder="联系电话" id="mobile" value=""></div>
        <div class="line">
		<!-- sel-provance -->
        <select id="s_province" name="s_province"></select><br>		
		</div>
         <div class="line">
		  <select id="s_city" name="s_city" ></select><br><!-- sel -->
		 </div>
         <div class="line">
		 <!-- sel-area -->
		 <select id="s_county" name="s_county"></select><br>
		 </div>
            <script type="text/javascript" src="/address/js/area.js"></script>
            <script type="text/javascript">_init_area();</script>
	 	 
        <div class="line"><input type="text" placeholder="详细地址" id="address" value=""></div>
    </div>

    <a  href="#"><div class="address_sub1"   >确认</div></a>
    <div class="address_sub2"      >取消</div></div><br>
	<div id="toastId2" class="toasttj2" style="display: none; opacity: 0;"></div>
<div id="BgDiv1"></div>
<div class="U-login-con">
            	<div class="DialogDiv"  style="display:none; ">
                    <div class="U-guodu-box">
                    <div>
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" >
                        <tr><td  align="center"><img src="img/loading.gif"></td></tr>
                        <tr><td  valign="middle" align="center" >提交中，请稍后！</td></tr>
                    </table>
                    </div>
            	</div>
     		</div>
          <div class="cl"></div>
</div>   

@endsection

@section('my-js')
<script type="text/javascript">


  $('.bk_validate_code').click(function () {
    $(this).attr('src', '/service/validate_code/create?random=' + Math.random());
  });

  function onLoginClick() {
    // 帐号
    var username = $('input[name=username]').val();
    if(username.length == 0) {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('帐号不能为空');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return;
    }
    if(username.indexOf('@') == -1) { //手机号
      if(username.length != 11 || username[0] != 1) {
        $('.bk_toptips').show();
        $('.bk_toptips span').html('帐号格式不对!');
        setTimeout(function() {$('.bk_toptips').hide();}, 2000);
        return;
      }
    } else {
      if(username.indexOf('.') == -1) {
        $('.bk_toptips').show();
        $('.bk_toptips span').html('帐号格式不对!');
        setTimeout(function() {$('.bk_toptips').hide();}, 2000);
        return;
      }
    }
    // 密码
    var password = $('input[name=password]').val();
    if(password.length == 0) {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('密码不能为空!');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return;
    }
    if(password.length < 6) {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('密码不能少于6位!');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return;
    }
    // 验证码
    var validate_code = $('input[name=validate_code]').val();
    if(validate_code.length == 0) {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('验证码不能为空!');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return;
    }
    if(validate_code.length < 4) {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('验证码不能少于4位!');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return;
    }

    $.ajax({
      type: "POST",
      url: '/service/login',
      dataType: 'json',
      cache: false,
      data: {username: username, password: password, validate_code: validate_code, _token: "{{csrf_token()}}"},
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

        $('.bk_toptips').show();
        $('.bk_toptips span').html('登录成功');
        setTimeout(function() {$('.bk_toptips').hide();}, 2000);

        location.href = "/home";

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