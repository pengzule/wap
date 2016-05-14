@extends('default')

@section('title','个人资料')

@section('content')

  

  <header class="header">
    <div class="fix_nav">
      <div style="max-width:768px;margin:0 auto;background:#000;position: relative;">
        <a class="nav-left back-icon" href="javascript:history.back();">返回</a>
        <div class="tit">个人资料</div>
      </div>
    </div>
  </header>
  <div class="container">
    <div class="row">
         <div class="list-group mb10">
            <a href="#" class="list-user-item tip">
           
            我的头像
            <span class="gary pull-right">   <div class="memberimg_m_pic ">
              <img class="img-circle" src="images/noavatar.png">
            </div></span>
          </a>
          <a href="#" class="list-group-item tip">
           
            会员名
            <span class="gary pull-right">{{$member->name}}</span>
          </a>
          <a href="#" class="list-group-item tip">
          
            我的收货地址
          </a>
          
        </div>

    </div>
  


  <div class="clear"></div>
</div>




@endsection

@section('my-js')



@endsection
