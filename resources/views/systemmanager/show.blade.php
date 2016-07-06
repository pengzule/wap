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
<table class="data_list" >
    <tr  bgcolor="#B2E0FF">
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