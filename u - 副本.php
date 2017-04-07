<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
		$stmt = $dbh->prepare('SELECT * from p where uid=:uid and dtime=:dtime and mtime=:mtime order by id desc');
		
		$dtime=date('Y',$ttitme);
		$mtime=date('n',$ttitme);
		$stmt->execute(array('uid' => $uligon,'dtime' => $dtime,'mtime' => $mtime));
	
		
		foreach ($stmt as $row) {
			$tp=$tp+$row['tp'];
			$dp=$dp+$row['dp'];
		}

?>
<!DOCTYPE html>
<html>
<head>
<title><?php
	echo $user_arr['name'];
?></title>
<style>
*{padding:0px;margin:0px;}
.main{padding: 12px;}
.pb10{margin-bottom:10px;}
.inss{padding: 6px 12px;
    color: red;
    background: #eee;
    border: 1px solid #ddd;
    cursor: pointer;}
.ffurr{
    border: 1px solid #ddd;
    padding: 10px;
    width: 339px;
}.hurl li {
    float: left;
    list-style: none;
    background: #ddd;
    padding: 6px 12px;
    border-right: 1px solid #eee;    cursor: pointer;
}/*利用:after伪元素*/  
.clearUl:after {  
content:"";
display: block;  
clear: both;  
}  .hurl{margin-bottom: 12px;}.liuu{text-decoration: underline;
    color: green;}.sdfsdlbbb{
	    margin-bottom: 6px;    list-style: none;
    cursor: pointer;}.sdfsdlbbb:hover{text-decoration:underline;}
</style>
</head>

<body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.9.0/jquery.min.js"></script>
<div class="main">

<div class="hear">
	<ul class="hurl clearUl">
		<li>用户：<?php
	echo $user_arr['name'];
?></li>
<li>日期：<?php
	echo date('Y-m-d',$ttitme);
?></li>
<li>本月总投票：<?php 
echo $tp;
?> 总点评：<?php 
echo $dp;
?></li>
<li class="liuu" mm="up">本月上传/修改</li>
<li class="liuu" mm="by">本月作品</li>
<li class="liuu" mm="bb">本月作品历史版本</li>
<li class="liuu" mm="dp">查看点评</li>
<li class="liuu" mm="ss">所有历史作品</li>
<li class="liuu" mm="home">首页</li>
<li class="liuu" mm="xgmm">修改密码</li>
<li class="liuu" mm="out">退出</li>
	</ul>
</div>

<div id="mmajax">

<form action="file.php" class="ffurr" method="POST" enctype="multipart/form-data"><p class="pb10">
<label for="file" style="font-size: 14px;">上传/修改:</label>
<input type="file" name="file" id="file" /> </p>
<p class="pb10" style="color:red;display:none;" id="zesscc">正在上传...</p>
<p class="pb10">
<input type="submit" id="submitdsfsd" name="submit" value="上传" class="inss" onclick="dasfas();" /></p>
<p class="pb10" style="font-size: 12px;color: #ccc;">图片上传进度请看浏览器左下角,每月作品25号之后禁止修改</p>
</form>

</div>


</div>
<script>
<?php
	if($_GET['mm']){
		echo 'ssdfsfsd(\''.$_GET['mm'].'\');';
	}
?>
function ssfs(uu){
	//location.href = '/u/'+uu+'.jpg';
	//window.location.href='/u/'+uu+'.jpg';
	window.open('/u/'+uu+'.jpg'); 
	return false;
}
function ssdfsfsd(mm){
  //var mm=$(this).attr('mm');
  if(mm=='up'){
	location.href = '/u.php';
	return false;
  }  else if(mm=='home'){
	location.href = '/';
	return false;
  }else if(mm=='ss'){
	//alert('功能即将开放');
	//return false;
  }else if(mm=='out'){
	location.href = '/out.php';
	return false;
  }
	$.ajax( {
		url: '/ajax.php?mm='+mm, //这里是静态页的地址
		type: "GET", //静态页用get方法，否则服务器会抛出405错误
		//dataType: "json",
		//cache: false,
		//async: false,
		beforeSend: function(){
		 // Handle the beforeSend event
		 $('#mmajax').html('<img src="5-130H2191321.gif" />');
		},
		success: function(data){
			$('#mmajax').html(data);
			//var result = $(data).find("另一个html页面的指定的一部分").html();
		}
	});
}
$(".liuu").click(function(){
  var mm=$(this).attr('mm');
  ssdfsfsd(mm);
  
});









function dasfas(){
	$('#submitdsfsd').hide();
	$('#zesscc').show();
}
</script>
</body>

</html>