@extends('default')

@section('title', '登录')

@section('content')

  <header class="header">
    <div class="fix_nav">
      <div style="max-width:768px;margin:0 auto;background:#000000;position: relative;">
        <a class="nav-left back-icon" href="javascript:history.back();">返回</a>
        <div class="tit" style="font-size:18px;">会员登陆</div>
      </div>
    </div>
  </header>
  <div class="maincontainer">
    <div class="container itemdetail mini-innner">
      <div class="row">
        <div class="col-md-12 tal mt20">
          <form class="form-signin" >
            <input name="username"   type="text" style="margin-bottom: -2px;-webkit-appearance:none; " class="form-control" placeholder="邮箱/手机号"  tabindex="1" />
            <br>
            <input name="password" type="password" class="form-control" placeholder="请输入密码"  style="-webkit-appearance:none;" autocomplete="off"  tabindex="2" />
            <br>
            <input class="form-control" style="width: 50%;display:inline-block" type="text" placeholder="请输入验证码" name="validate_code"/>
            <img  src="/service/validate_code/create" style="float:right" class="jqmkj_validate_code"/>

            <label class="checkbox">
              <input id="_spring_security_remember_me" name="_spring_security_remember_me" type="checkbox"   tabindex="4" /> 记住我
              <a href="/forget" style="float:right">忘记密码</a>
            </label>
            <div class="clear"></div>
            <div class="col-xs-6 p0"><a class="btn btn-info btn-block" onclick="onLoginClick();"  tabindex="5" >登  陆</a></div>
            <div class="col-xs-5 p0" style="margin-left:10px;"><button type="button" class="btn btn-default btn-block" onclick="window.location.href='/register'"  tabindex="6" >注 册</button></div>
          </form>
        </div>
      </div>
    </div>
  </div>




@endsection

@section('my-js')
<script type="text/javascript">


  $('.jqmkj_validate_code').click(function () {
    $(this).attr('src', '/service/validate_code/create?random=' + Math.random());
  });

  function onLoginClick() {
    // 帐号
    var username = $('input[name=username]').val();
    if(username.length == 0) {
      $('.jqmkj_toptips').show();
      $('.jqmkj_toptips span').html('帐号不能为空');
      setTimeout(function() {$('.jqmkj_toptips').hide();}, 2000);
      return;
    }
    if(username.indexOf('@') == -1) { //手机号
      if(username.length != 11 || username[0] != 1) {
        $('.jqmkj_toptips').show();
        $('.jqmkj_toptips span').html('帐号格式不对!');
        setTimeout(function() {$('.jqmkj_toptips').hide();}, 2000);
        return;
      }
    } else {
      if(username.indexOf('.') == -1) {
        $('.jqmkj_toptips').show();
        $('.jqmkj_toptips span').html('帐号格式不对!');
        setTimeout(function() {$('.jqmkj_toptips').hide();}, 2000);
        return;
      }
    }
    // 密码
    var password = $('input[name=password]').val();
    if(password.length == 0) {
      $('.jqmkj_toptips').show();
      $('.jqmkj_toptips span').html('密码不能为空!');
      setTimeout(function() {$('.jqmkj_toptips').hide();}, 2000);
      return;
    }
    if(password.length < 6) {
      $('.jqmkj_toptips').show();
      $('.jqmkj_toptips span').html('密码不能少于6位!');
      setTimeout(function() {$('.jqmkj_toptips').hide();}, 2000);
      return;
    }
    // 验证码
    var validate_code = $('input[name=validate_code]').val();
    if(validate_code.length == 0) {
      $('.jqmkj_toptips').show();
      $('.jqmkj_toptips span').html('验证码不能为空!');
      setTimeout(function() {$('.jqmkj_toptips').hide();}, 2000);
      return;
    }
    if(validate_code.length < 4) {
      $('.jqmkj_toptips').show();
      $('.jqmkj_toptips span').html('验证码不能少于4位!');
      setTimeout(function() {$('.jqmkj_toptips').hide();}, 2000);
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

        $('.jqmkj_toptips').show();
        $('.jqmkj_toptips span').html('登录成功');
        setTimeout(function() {$('.jqmkj_toptips').hide();}, 2000);
        //location.href = "{!!$return_url!!}";
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
