<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="/themes/css/base.css" rel="stylesheet" media="screen"/>
    <!-- Bootstrap style responsive -->
    <link href="/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Google-code-prettify -->
    <script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>
    <!-- fav and touch icons -->
    <style type="text/css" id="enject">

        table
        {
            border-collapse:collapse;
        }
        table, td, th,tr
        {
            border:1px solid #e3e3e3;
            border-collapse:collapse;

        }
        select{
            width:100%;
            border:0;
            border:none;
            margin-bottom: 0;
        }
        input{

            border:0;
            border:none;
            margin-bottom: 0;
        .odd {
            background-color: #B2E0FF;
        }
        .even {
            background-color: #cef;
        }

    </style>
    <script type="text/javascript">

        $(document).ready(function(){
            $("tr:even").css("background-color","#B2E0FF");
        });

    </script>
    <script>
        $(document).ready(function() {
            $('tr').addClass('odd');
            $('tr:even').addClass('even'); //奇偶变色，添加样式
        });
    </script>

</head>
<body>
<!-- Header End====================================================================== -->
<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            <div id="sidebar" class="span3">
                <div class="well well-small">System Manager</div>
                <ul id="sideManu" class="nav nav-tabs nav-stacked">
                    <li class="subMenu open " id="80"><a id="xml0" class="parent">{{$result_arr}} </a>
                        <ul>
                            @foreach($ips as $ip)
                            <li><a ><i class="icon-chevron-right"></i>{{$ip[0]}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="subMenu " id="90"><a  id="xml1" class="parent"> </a>
                        <ul style="display:none">
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                        </ul>
                    </li>
                    <li class="subMenu  " id="10"><a  id="xml2" class="parent"></a>
                        <ul style="display:none">
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                        </ul>
                    </li>
                    <li><a >127.0.0.1:8080</a></li>
                    <li><a >127.0.0.1:9090</a></li>
                    <li><a >127.0.0.1:1010</a></li>
                </ul>
                <br/>

            </div>
            <!-- Sidebar end=============================================== -->
            <div class="span9" id="mainCol">
                <ul class="breadcrumb">
                    <li><a >System Manager</a> <span class="divider">/</span></li>
                    <li class="active" id="parent">{{$result_arr}}</li>
                </ul>

                <hr class="soft"/>
                <div id="gaminfo">
                <table>
                    <tr>
                        <th >Name</th>
                        <th >IP:Port</th>
                        <th >Time</th>
                        <th >LogLevel</th>
                        <th >Set State</th>
                        <th >Received</th>
                        <th >Send Command</th>
                    </tr>
                    <tr>
                        <td id="GAM">{{$result_arr}}</td>
                        <td id="GAM">{{$IpPort}}</td>
                        <td>{{$time}}</td>
                        <td>
                            <select  id="change" onchange="onSetlogLevel(this);" style="width:85px;" >
                                @foreach($loglevel_arr as $level)
                                    @if($loglevel == $level)
                                    <option selected value="{{$level}}">{{$level}}</option>
                                    @else
                                    <option  value="{{$level}}">{{$level}}</option>
                                    @endif
                                @endforeach
                            </select >
                        </td>
                        <td>
                            <select style="width:80px;">
                                <option value="">Online</option>
                                <option value="">Offline</option>
                            </select >
                        </td>
                        <td id="state" class="received">{{$result}}</td>
                        <td>
                            <textarea  name="comment" rows="1" class=" pzl_textarea form-control" value="" ></textarea>
                            <a  onclick="onSendCommand(this);"  class="btn ">Send</a>
                        </td>

                    </tr>
                </table>
                </div>

                <hr class="soft"/>

                <div >
                <table id="appinfo">
                    <tr>
                        <th >Name</th>
                        <th >IP:Port</th>
                        <th >Time</th>
                        <th>LogLevel</th>
                        <th >Set State</th>
                        <th >Received</th>
                        <th >Send Command</th>
                    </tr>

                    @foreach($ips as $ip)
                    <tr >
                        <td>{{$ip[0]}}</td>
                        <td>{{$ip[1]}}</td>
                        <td>{{$time}}</td>
                        <td>
                            <select  id="change" style="width:85px;" onchange="onSetlogLevel(this);">
                                @foreach($loglevel_arr as $level)
                                    @if($loglevel == $level)
                                        <option selected value="">{{$level}}</option>
                                    @else
                                        <option  >{{$level}}</option>
                                    @endif
                                @endforeach
                            </select >
                        </td>
                        <td>
                            <select style="width:80px;">
                                <option value="">Online</option>
                                <option value="">Offline</option>
                            </select >
                        </td>
                        <td class="received">{{$result}}</td>
                        <td>
                            <textarea  name="comment" rows="1" class=" pzl_textarea form-control" value="" ></textarea>
                            <a  onclick="onSendCommand(this);"  class="btn ">Send</a>
                        </td>
                    </tr>
                    @endforeach


                </table>
                </div>
                <hr class="soft"/>

            </div>
        </div></div>
</div>

<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="/themes/js/jquery.js" type="text/javascript"></script>
<script src="/themes/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/themes/js/google-code-prettify/prettify.js"></script>
<script src="/js/loadxmldoc.js"></script>
<script src="/themes/js/bootshop.js"></script>
<script src="/themes/js/jquery.lightbox-0.5.js"></script>
<script type="text/javascript">
    /* 当鼠标移到表格上是，当前一行背景变色 */
    $(document).ready(function(){
        $(".data_list tr td").mouseover(function(){
            $(this).parent().find("td").css("background-color","#d5f4fe");
        });
    })
    /* 当鼠标在表格上移动时，离开的那一行背景恢复 */
    $(document).ready(function(){
        $(".data_list tr td").mouseout(function(){
            var bgc = $(this).parent().attr("bg");
            $(this).parent().find("td").css("background-color",bgc);
        });
    })

    $(document).ready(function(){
        var color="#ffeab3"
        $(".data_list tr:odd td").css("background-color",color);  //改变偶数行背景色
        /* 把背景色保存到属性中 */
        $(".data_list tr:odd").attr("bg",color);
        $(".data_list tr:even").attr("bg","#fff");
    })
</script>
<script>
    //xmlDoc=loadXMLDoc("note.xml");

   // x=xmlDoc.getElementsByTagName("parent");
    //var i = 0;
   // for(i ;i< x.length;i++)
    //{
    //    document.getElementById("xml"+i).innerHTML = x[i].childNodes[0].nodeValue;
  //  }

</script>
<script type="text/javascript">
    jQuery(document).ready(function() {

        //绑定 点击事件
        $(document).on('click', '.parent', function(event){

        //$(".parent").bind("click",function() {
            var id = $(this).attr("id");
            var name = $(this).html();

            $.ajax({
                type: "GET",
                url: '/parent',
                dataType: 'json',
                cache: false,
                data: {name:name, _token: "{{csrf_token()}}"},
                success: function(data) {
                    console.log("获取:");
                    console.log(data);
                    $('#state').html('');
                    $('#appinfo').html('');
                    $('#parent').html('');
                    $('#GAM').html('');
                    $('.logselect').html('');

                    $('#parent').html(name);
                    $('#GAM').html(name);
                    $('#state').html(data.state);

                    var top = '<tr bgcolor="#B2E0FF">'+
                    '<th >'+'Name'+'</th>'+
                    '<th >'+'IP:Port'+'</th>'+
                    '<th >'+'Time'+'</th>'+
                    '<th >'+'LogLevel'+'</th>'+
                    '<th >'+'Set State'+'</th>'+
                    '<th >'+'Received'+'</th>'+
                    '<th >'+'Send Command'+'</th>'+
                    '</tr>';

                    $('#appinfo').append(top);
                    var arr = data.time.date.split('.');

                    for(var i=0; i<data.ips.length; i++) {

                        if (i%2==0){
                            var node =
                                    '<tr >'+
                                    '<td>'+data.ips[i][0]+'</td>'+
                                    '<td>'+data.ips[i][1]+'</td>'+
                                    '<td>'+arr[0]+'</td>'+
                                    '<td >'+
                                    '<select id="change" class="logselect" onchange="onSetlogLevel(this);" style="width:85px;" >'+
                                    '</select >'+
                                    '</td>'+
                                    '<td >'+
                                    '<select style="width:80px;">'+
                                    '<option value="">'+'Online'+'</option>'+
                                    '<option value="">'+'Offline'+'</option>'+
                                    '</select>'+
                                    '</td>'+
                                    '<td>'+data.state+'</td>'+
                                    '<td>'+
                                    '<textarea  name="comment" rows="1" class=" pzl_textarea form-control" value="" >'+'</textarea>'+
                                    '<a  onclick="onSendCommand(this);"  class="btn ">'+'Send'+'</a>'+
                                    '</td>'+
                                    '</tr>';
                        }else{
                            var node =
                                    '<tr bgcolor="#B2E0FF">'+
                                    '<td>'+data.ips[i][0]+'</td>'+
                                    '<td>'+data.ips[i][1]+'</td>'+
                                    '<td>'+arr[0]+'</td>'+
                                    '<td >'+
                                    '<select id="change" class="logselect" onchange="onSetlogLevel(this);" style="width:85px;" >'+
                                    '</select >'+
                                    '</td>'+

                                    '<td>'+
                                    '<select style="width:80px">'+
                                    '<option value="">'+'Online'+'</option>'+
                                    '<option value="">'+'Offline'+'</option>'+
                                    '</select >'+
                                    '</td>'+
                                    '<td>'+data.state+'</td>'+
                                    '<td>'+
                                    '<textarea  name="comment" rows="1" class=" pzl_textarea form-control" value="" >'+'</textarea>'+
                                    '<a  onclick="onSendCommand(this);"  class="btn ">'+'Send'+'</a>'+
                                    '</td>'+
                                    '</tr>';
                        }

                        $('#appinfo').append(node);
                    }
                    for(var j=0;j<data.loglevel_arr.length;j++){
                        var log = '';
                        if(data.loglevel == data.loglevel_arr[j])
                        {

                            log ='<option selected value="">'+data.loglevel_arr[j]+'</option>';
                        }else {
                            log ='<option value="">'+data.loglevel_arr[j]+'</option>';
                        }
                        $('.logselect').append(log);
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


    function onSendCommand(obj)
    {
        var _this = $(obj);
        var _obj = _this.prevAll('.pzl_textarea');
        var command = $(_obj).val();

        $.ajax({
            type: "GET",
            url: '/sendcommand',
            dataType: 'json',
            cache: false,
            data: {command:command, _token: "{{csrf_token()}}"},
            success: function(data) {
                console.log("获取:");
                console.log(data);
                _this.parent().prev().html('');
                _this.parent().prev().html(data.return);


            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });

    }

    function onSetlogLevel(obj)
    {
        var _this = $(obj);
        //var _obj = document.getElementById('change').value;
       var _obj = _this.val();

        var command ='set loglevel '+ _obj.toLowerCase();

        $.ajax({
            type: "GET",
            url: '/sendcommand',
            dataType: 'json',
            cache: false,
            data: {command:command, _token: "{{csrf_token()}}"},
            success: function(data) {
                console.log("获取:");
                console.log(data);
                _this.parent().next().next().html('');
                _this.parent().next().next().html(data.return);

            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });

    }


       
    </script>
<!-- Themes switcher section ============================================================================================= -->

<span id="themesBtn"></span>
</body>
</html>