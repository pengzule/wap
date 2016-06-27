// JavaScript Document

function login_form(thisform) //验证登录
{
with (thisform)
  {
  if(username.value.length < 2 || username.value.length > 10){
   alert("请正确输入您的用户名!");
   username.focus();return false} 
  }
with (thisform)
  {
  if(password.value.length < 6 || password.value.length > 20){
  alert("请正确输入您的密码!密码不小于6个字符,不大于20个字符");
   password.focus();return false}
  }
}

function user_up()  //验证修改
{
	  var frm      = document.forms['form_user_up'];
	  var hy_passwordj     = frm.elements['hy_passwordj'].value;
	  var hy_password     = frm.elements['hy_password'].value;
	  var hy_password1    = frm.elements['hy_password1'].value;
	  
	   var tel             = frm.elements['tel'].value;
	  var qq              = frm.elements['qq'].value;
	  
	  var email           = frm.elements['email'].value;
	  
    if(hy_passwordj.length < 6 || hy_passwordj.length > 20){
   document.getElementById('hy_passwordjs').innerHTML="旧密码不小于6个字符,不大于20个字符";
   frm.elements['hy_passwordj'].focus();return false}
   else
   {document.getElementById('hy_passwordjs').innerHTML="";}
   
    if(hy_password.length < 6 || hy_password.length > 20){
   document.getElementById('hy_passwords').innerHTML="新密码不小于6个字符,不大于20个字符";
   frm.elements['hy_password'].focus();return false}
   else
   {document.getElementById('hy_passwords').innerHTML="";}
   
   if(hy_password!=hy_password1){
   document.getElementById('hy_password1s').innerHTML="两次密码不一致";
   frm.elements['hy_password1'].focus();return false}
   else
   {document.getElementById('hy_password1s').innerHTML="";}
   
      if(tel.length < 6 || tel.length > 20 || isNumber(tel)==0){
   document.getElementById('tels').innerHTML="请正确填写您的联系电话";
   frm.elements['tel'].focus();return false}
   else
   {document.getElementById('tels').innerHTML="";}
   
    if(qq.length < 6 || qq.length > 11 || isNumber(qq)==0){
   document.getElementById('qqs').innerHTML="请正确填写您的联系 Q Q ";
   frm.elements['qq'].focus();return false}
   else
   {document.getElementById('qqs').innerHTML="";}
   
   
   
  if(email.length < 6 || isEmail(email)==0 ){
    document.getElementById('emails').innerHTML="请填写正确的邮箱格式";
    frm.elements['email'].focus();return false}
   else
   {document.getElementById('emails').innerHTML="";}
   return true;
}

function validate_form()  //验证注册
{
	  var frm             = document.forms['form_nav'];
	  var hy_username     = frm.elements['hy_username'].value;
	  var hy_password     = frm.elements['hy_password'].value;
	  var hy_password1    = frm.elements['hy_password1'].value;
	  var tel             = frm.elements['tel'].value;
	  var qq              = frm.elements['qq'].value;
	  var email           = frm.elements['email'].value;
	  
   if(hy_username.length < 2 || hy_username.length > 10){
   document.getElementById('hy_usernames').innerHTML="用户名必须在2-10个字符之间";
   frm.elements['hy_username'].focus();return false}
   else
   {document.getElementById('hy_usernames').innerHTML="";}
   
    if(hy_password.length < 6 || hy_password.length > 20){
   document.getElementById('hy_passwords').innerHTML="密码不小于6个字符,不大于20个字符";
   frm.elements['hy_password'].focus();return false}
   else
   {document.getElementById('hy_passwords').innerHTML="";}
   
   if(hy_password!=hy_password1){
   document.getElementById('hy_password1s').innerHTML="两次密码不一致";
   frm.elements['hy_password1'].focus();return false}
   else
   {document.getElementById('hy_password1s').innerHTML="";}
   
      if(tel.length < 6 || tel.length > 20 || isNumber(tel)==0){
   document.getElementById('tels').innerHTML="请正确填写您的联系电话";
   frm.elements['tel'].focus();return false}
   else
   {document.getElementById('tels').innerHTML="";}
   
    if(qq.length < 6 || qq.length > 11 || isNumber(qq)==0){
   document.getElementById('qqs').innerHTML="请正确填写您的联系 Q Q ";
   frm.elements['qq'].focus();return false}
   else
   {document.getElementById('qqs').innerHTML="";}
   
   
  if(email.length < 6 || isEmail(email)==0 ){
    document.getElementById('emails').innerHTML="请填写正确的邮箱格式";
    frm.elements['email'].focus();return false}
   else
   {document.getElementById('emails').innerHTML="";}
   return true;
}


function isEmail(str) //验证邮箱格式
	{ var myReg = /^[-_A-Za-z0-9]+@([_A-Za-z0-9]+\.)+[A-Za-z0-9]{2,3}$/; 
	if (myReg.test(str)) return true; return false; } 

function yzyh(obj,value){                                          //验证用户名
	 if(value.length < 2 || value.length > 10){
   document.getElementById('hy_usernames').innerHTML="用户名2-10个字符之间";
   obj.focus();return false}
   else
   {document.getElementById('hy_usernames').innerHTML="";}
}

function yzmm(obj,value){                                          //验证密码
	 if(value.length < 6 || value.length > 20){
   document.getElementById('hy_passwords').innerHTML="密码不小于6个字符,不大于20个字符";
   obj.focus();return false}
   else
   {document.getElementById('hy_passwords').innerHTML="";}
}

function yzqrmm(obj,value){    //验证确认密码
	if(value.length < 6 || value.length > 20)
   {document.getElementById('hy_password1s').innerHTML="密码不小于6个字符";
   obj.focus();return false}
   else if(document.getElementById('hy_password').value != value ){
   document.getElementById('hy_password1s').innerHTML="两次密码不一致";
   obj.focus();return false}
   else
   {document.getElementById('hy_password1s').innerHTML="";}
}

function yzyx(obj,value){                                          //验证邮箱
   if(value.length < 6 || value.length > 40 || isEmail(value)==0 ){
   document.getElementById('emails').innerHTML="请填写正确的邮箱格式";
   email.focus();return false}
   else
   {document.getElementById('emails').innerHTML="";}
}

function yzmm_jiu(obj,value){                                          //验证旧密码
	 if(value.length < 6 || value.length > 20){
   document.getElementById('hy_passwordjs').innerHTML="密码不小于6个字符,不大于20个字符";
   obj.focus();return false}
   else
   {document.getElementById('hy_passwordjs').innerHTML="";}
}

function isNumber(str)  { var reg = /^\d+$/;    if (reg.test(str)) return true; return false;} //验证数字格式
function isZh(str){  var reg = /^[\u4e00-\u9fa5]+$/; if (reg.test(str)) return true; return false;} //验证汉字格式


function app()  //验证简历
{
	  var frm      = document.forms['form_app'];
	  var post     = frm.elements['postname'].value;
	  var name     = frm.elements['name'].value;
	  var degree   = frm.elements['degree'].value;
	  var school   = frm.elements['school'].value;
	  var tel      = frm.elements['tel'].value;
	  var qq       = frm.elements['qq'].value;
	  var remark   = frm.elements['remark'].value;
	  var email    = frm.elements['email'].value;
	  
    if(post.length < 1 || post.length > 100){
   document.getElementById('posts').innerHTML="请选择应聘职位";
   return false;}
   else
   {document.getElementById('posts').innerHTML="";}
   
    if(name.length < 2 || name.length > 20 || isZh(name)==0){
   document.getElementById('names').innerHTML="请正确填写您的姓名,姓名只能为汉字";
   frm.elements['name'].focus();return false;}
   else
   {document.getElementById('names').innerHTML="";}
   
   if(degree.length < 2 || degree.length > 20 || isZh(degree)==0){
   document.getElementById('degrees').innerHTML="请正确填写您的最高学历";
   frm.elements['degree'].focus();return false;}
   else
   {document.getElementById('degrees').innerHTML="";}
   
   
   if(school.length < 2 || school.length > 100){
   document.getElementById('schools').innerHTML="请正确填写您的毕业学校";
   frm.elements['school'].focus();return false}
   else
   {document.getElementById('schools').innerHTML="";}
   
    if(tel.length < 6 || tel.length > 20 || isNumber(tel)==0){
   document.getElementById('tels').innerHTML="请正确填写您的联系电话";
   frm.elements['tel'].focus();return false}
   else
   {document.getElementById('tels').innerHTML="";}
   
    if(qq.length < 6 || qq.length > 11 || isNumber(qq)==0){
   document.getElementById('qqs').innerHTML="请正确填写您的联系 Q Q ";
   frm.elements['qq'].focus();return false}
   else
   {document.getElementById('qqs').innerHTML="";}
   
     if(remark.length < 1 ){
   document.getElementById('remarks').innerHTML="请填写您的其它信息 ";
   frm.elements['remark'].focus();return false}
   else
   {document.getElementById('remarks').innerHTML="";}
   
   
  if(email.length < 6 || email.length > 100 || isEmail(email)==0 ){
    document.getElementById('emails').innerHTML="请填写正确的邮箱格式";
    frm.elements['email'].focus();return false}
   else
   {document.getElementById('emails').innerHTML="";} 
   
   return true;
}


function order()  //验证订单
{
	  var frm      = document.forms['form_order'];
	  var name     = frm.elements['name'].value;
	  var tel      = frm.elements['tel'].value;
	  var qq       = frm.elements['qq'].value;
	  var email    = frm.elements['email'].value;
   
    if(name.length < 2 || name.length > 20 || isZh(name)==0){
   document.getElementById('names').innerHTML="请正确填写您的姓名,姓名只能为汉字";
   frm.elements['name'].focus();return false;}
   else
   {document.getElementById('names').innerHTML="";}
   
    if(tel.length < 6 || tel.length > 20 || isNumber(tel)==0){
   document.getElementById('tels').innerHTML="请正确填写您的联系电话";
   frm.elements['tel'].focus();return false}
   else
   {document.getElementById('tels').innerHTML="";}
   
    if(qq.length < 6 || qq.length > 11 || isNumber(qq)==0){
   document.getElementById('qqs').innerHTML="请正确填写您的联系 Q Q ";
   frm.elements['qq'].focus();return false}
   else
   {document.getElementById('qqs').innerHTML="";}
      
  if(email.length < 6 || email.length > 100 || isEmail(email)==0 ){
    document.getElementById('emails').innerHTML="请填写正确的邮箱格式";
    frm.elements['email'].focus();return false}
   else
   {document.getElementById('emails').innerHTML="";} 
   
   return true;
}