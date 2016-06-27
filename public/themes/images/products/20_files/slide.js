$(document).ready(function(){
  
  $('li.mainlevel').mousemove(function(){
  $(this).find('ul').slideDown();//you can give it a speed
  });
  $('li.mainlevel').mouseleave(function(){
  $(this).find('ul').slideUp("fast");
  });
  
});
function showsub(id){
   document.getElementById(id).className="dq";
}
function hidsub(id){
   document.getElementById(id).className="";
} 