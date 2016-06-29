<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script>!window.jQuery && document.write('<script src="js/jquery-1.4.2.min.js"><\/script>')
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("span").click(function(){
                alert($(this).html()); //把DOM的this对象包装成jq对象
            });

        });

    </script>
</head>
<body>
<span>aaa</span>
<span>bbb</span>
<span>ccc</span>
<span>ddd</span>
<select name="btn" id="btn" >
    <option value="1">日志标题</option>
    <option value="2">日志全文</option>
    <option value="3">评论引用</option>
    <option value="4">所有留言</option>
    <option value="5">页面搜索</option>
</select>
<script type="text/javascript">
    $("#btn").bind("click",function(){
        alert($(this).val());
    })

    $("#btn").click(function(){
        alert($(this).html()); //把DOM的this对象包装成jq对象
    });
</script>
</body>