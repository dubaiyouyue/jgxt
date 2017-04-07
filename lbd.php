<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0064)http://www.17sucai.com/preview/137615/2015-01-15/demo/index.html -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><HTML 
xmlns="http://www.w3.org/1999/xhtml"><HEAD><META content="IE=11.0000" 
http-equiv="X-UA-Compatible">
 
<META http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<TITLE>绑定QQ号登录</TITLE> 
<SCRIPT src="js/jquery-1.9.1.min.js" type="text/javascript"></SCRIPT>
 <script src="layer/layer.js"></script>
<STYLE>
body{
	background: #ebebeb;
	font-family: "Helvetica Neue","Hiragino Sans GB","Microsoft YaHei","\9ED1\4F53",Arial,sans-serif;
	color: #222;
	font-size: 12px;
}
*{padding: 0px;margin: 0px;}
.top_div{
	background: #008ead;
	width: 100%;
	height: 400px;
}
.ipt{
	border: 1px solid #d3d3d3;
	padding: 10px 10px;
	width: 290px;
	border-radius: 4px;
	padding-left: 35px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
	-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s
}
.ipt:focus{
	border-color: #66afe9;
	outline: 0;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)
}
.u_logo{
	background: url("images/username.png") no-repeat;
	padding: 10px 10px;
	position: absolute;
	top: 43px;
	left: 40px;

}
.p_logo{
	background: url("images/password.png") no-repeat;
	padding: 10px 10px;
	position: absolute;
	top: 12px;
	left: 40px;
}
a{
	text-decoration: none;
}
.tou{
	background: url("images/tou.png") no-repeat;
	width: 97px;
	height: 92px;
	position: absolute;
	top: -87px;
	left: 140px;
}
.left_hand{
	background: url("images/left_hand.png") no-repeat;
	width: 32px;
	height: 37px;
	position: absolute;
	top: -38px;
	left: 150px;
}
.right_hand{
	background: url("images/right_hand.png") no-repeat;
	width: 32px;
	height: 37px;
	position: absolute;
	top: -38px;
	right: -64px;
}
.initial_left_hand{
	background: url("images/hand.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -12px;
	left: 100px;
}
.initial_right_hand{
	background: url("images/hand.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -12px;
	right: -112px;
}
.left_handing{
	background: url("images/left-handing.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -24px;
	left: 139px;
}
.right_handinging{
	background: url("images/right_handing.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -21px;
	left: 210px;
}

</STYLE>
     
<SCRIPT type="text/javascript">
$(function(){
	//得到焦点
	$("#password").focus(function(){
		$("#left_hand").animate({
			left: "150",
			top: " -38"
		},{step: function(){
			if(parseInt($("#left_hand").css("left"))>140){
				$("#left_hand").attr("class","left_hand");
			}
		}}, 2000);
		$("#right_hand").animate({
			right: "-64",
			top: "-38px"
		},{step: function(){
			if(parseInt($("#right_hand").css("right"))> -70){
				$("#right_hand").attr("class","right_hand");
			}
		}}, 2000);
	});
	//失去焦点
	$("#password").blur(function(){
		$("#left_hand").attr("class","initial_left_hand");
		$("#left_hand").attr("style","left:100px;top:-12px;");
		$("#right_hand").attr("class","initial_right_hand");
		$("#right_hand").attr("style","right:-112px;top:-12px");
	});
});
</SCRIPT>
 
<META name="GENERATOR" content="MSHTML 11.00.9600.17496"></HEAD> 
<BODY><form name="myform" id="myform" action="ldb.php" method="POST" autocomplete="off">
<DIV class="top_div"></DIV>
<DIV style="background: rgb(255, 255, 255); margin: -100px auto auto; border: 1px solid rgb(231, 231, 231); border-image: none; width: 400px; height: 289px; text-align: center;">
<DIV style="width: 165px; height: 96px; position: absolute;">
<DIV class="tou"></DIV>
<DIV class="initial_left_hand" id="left_hand"></DIV>
<DIV class="initial_right_hand" id="right_hand"></DIV></DIV>
<P style="padding: 30px 0px 10px; position: relative;"><SPAN 
class="u_logo"></SPAN>         <INPUT autocomplete="off" class="ipt" type="text" name="yhm" id="yhm" placeholder="请输入用户名" value=""> 
    </P>
<P style="position: relative;"><SPAN class="p_logo"></SPAN>         
<INPUT autocomplete="off" class="ipt" id="password" type="password" placeholder="请输入密码" name="password" value="">   
  </P>
  
  
<P style="position: relative;margin-top:10px;"><SPAN class="p_logo"></SPAN>
			<input autocomplete="off" class="ipt" autocomplete="off" type="text" name="code" id="code" placeholder="请输入验证码" value="" / >
			

			<img style="margin-top:10px;cursor: pointer;" id="dsafasdfdas" onclick="this.src='/cachec/yzm.php?a=showseccode&update=' + Math.random()" src="/cachec/yzm.php" width="336px;" height="39px;">
			
			 </P>
  
  
  
  
  
  
<DIV style="height: 50px; line-height: 50px; margin-top: 30px; border-top-color: rgb(231, 231, 231); border-top-width: 1px; border-top-style: solid;">
<P style="margin: 0px 35px 20px 45px;"><SPAN style="float: left;"><A style="color: rgb(204, 204, 204);" 
href="javascript:;" onclick="wjmm();">忘记密码?</A></SPAN> 
           <SPAN style="float: right;">
		
		   
		   <A style="color: rgb(204, 204, 204); margin-right: 10px;" 
href="/register.php">注册</A>  
              

<input type="button" style="background: rgb(0, 142, 173); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;"  value="登录绑定QQ号" onclick="ajaxpost();" />


           </SPAN>         </P></DIV></DIV>
		   <div style="text-align:center;">

</div></form>
<script>
function wjmm(){
	layer.alert('请联系管理员重置密码。',{title:'提示'});
}
</script>
<script>
var loadinggif='data:image/gif;base64,R0lGODlhEAAQALMPAHp6evf394qKiry8vJOTk83NzYKCgubm5t7e3qysrMXFxe7u7pubm7S0tKOjo////yH/C05FVFNDQVBFMi4wAwEAAAAh+QQJCAAPACwAAAAAEAAQAAAETPDJSau9NRDAgWxDYGmdZADCkQnlU7CCOA3oNgXsQG2FRhUAAoWDIU6MGeSDR0m4ghRa7JjIUXCogqQzpRxYhi2HILsOGuJxGcNuTyIAIfkECQgADwAsAAAAABAAEAAABGLwSXmMmjhLAQjSWDAYQHmAz8GVQPIESxZwggIYS0AIATYAvAdh8OIQJwRAQbJkdjAlUCA6KfU0VEmyGWgWnpNfcEAoAo6SmWtBUtCuk9gjwQKeQAeWYQAHIZICKBoKBncTEQAh+QQJCAAPACwAAAAAEAAQAAAEWvDJORejGCtQsgwDAQAGGWSHMK7jgAWq0CGj0VEDIJxPnvAU0a13eAQKrsnI81gqAZ6AUzIonA7JRwFAyAQSgCQsjCmUAIhjDEhlrQTFV+lMGLApWwUzw1jsIwAh+QQJCAAPACwAAAAAEAAQAAAETvDJSau9L4QaBgEAMWgEQh0CqALCZ0pBKhRSkYLvM7Ab/OGThoE2+QExyAdiuexhVglKwdCgqKKTGGBgBc00Np7VcVsJDpVo5ydyJt/wCAAh+QQJCAAPACwAAAAAEAAQAAAEWvDJSau9OAwCABnBtQhdCQjHlQhFWJBCOKWPLAXk8KQIkCwWBcAgMDw4Q5CkgOwohCVCYTIwdAgPolVhWSQAiN1jcLLVQrQbrBV4EcySA8l0Alo0yA8cw+9TIgAh+QQFCAAPACwAAAAAEAAQAAAEWvDJSau9WA4AyAhWMChPwXHCQRUGYARgKQBCzJxAQgXzIC2KFkc1MREoHMTAhwQ0Y5oBgkMhAAqUw8mgWGho0EcCx5DwaAUQrGXATg6zE7bwCQ2sAGZmz7dEAAA7';
function ajaxpost(){
	var yhm=$('#yhm').val();
	var password=$('#password').val();
	var code=$('#code').val();
	//alert(yhm);
	if(!yhm){
		layer.alert('请填写用户名',{title:'提示'});
		//$('#yhm').focus();
		return false;
	}
	if(!password){
		layer.alert('请填写密码',{title:'提示'});
		//$('#password').focus();
		return false;
	}
	if(!code){
		layer.alert('请填写验证码',{title:'提示'});
		//$('#code').focus();
		return false;
	}
	
    $.ajax( {
        url:"/ldb.php", 
        type: "post", 
        data:"yhm="+yhm+"&password="+password+"&code="+code,
        //dataType: "json",
        //cache: false,
        //async: false,
        beforeSend: function(){
         // Handle the beforeSend event
        },
        success: function(datas){
			//alert(datas);
			
            if(datas==1){
				layer.alert('数据异常！登录失败！',{title:'提示'});
				newsss();
				return false;
			}else if(datas==2){
				layer.alert('验证码错误！',{title:'提示'});newsss();
				return false;
			}else if(datas==3){
				layer.alert('用户名未注册!',{title:'提示'});newsss();
				return false;
			}else if(datas==4){
				layer.alert('用户名被禁止登录使用或未通过审核！',{title:'提示'});newsss();
				return false;
			}else if(datas==5){
				layer.alert('用户名或密码错误!',{title:'提示'});newsss();
				return false;
			}else if(datas=='ok' || datas=='ok0' || datas=='ok1'){
				newsss();
				if(datas=='ok1') location.href = 'a.php';
				else location.href = 'u.php';
				return false;
			}else{
				layer.alert('服务器繁忙!登录失败！',{title:'提示'});newsss();
				return false;
			}
        }
    });
}
function newsss(){
	$('#code').val('');
	$("#dsafasdfdas").attr("src",'/cachec/yzm.php?a=showseccode&update=' + Math.random());
}
</script>
</BODY></HTML>
