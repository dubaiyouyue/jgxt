<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	
	$stmt = $dbh->prepare('SELECT * from user order by id desc');
	$stmt->execute();


	
	?>
	<!DOCTYPE html>
<html>
<head>
<title><?php
	echo $user_arr['name'];
?></title><meta http-equiv="content-type" content="text/html; charset=UTF-8" />
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
    cursor: pointer;}.sdfsdlbbb:hover,.adfsas:hover,.fdsafdasppp:hover{text-decoration:underline;}.adfsas{text-decoration:none;color:#333;}
	.fdsafdasppp a:hover{color:red;font-weight:bolder;}
</style>
</head>

<body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.9.0/jquery.min.js"></script>
<div class="main">

<div class="hear">
	<ul class="hurl clearUl"><li class="liuu" mm="home">首页</li>
		<li>用户：<?php
	echo $user_arr['name'];
?></li>
<li>日期：<?php
	echo date('Y-m-d',$ttitme);
?></li>

<a href="aset.php"><li class="liuu">设置</li></a>
<a href="tplj.php"><li class="liuu">投票链接 <?php
	if($conf['ss']<$ttitme) echo '<span style="color:red;">(已过期)</span>';
?></li></a>
<li class="liuu" mm="dp">查看点评</li>
<a href="/ae.php?id=<?php
	echo $uligon;
?>"><li class="liuu">修改密码</li></a>
<a href="out.php"><li class="liuu">退出</li></a>
	</ul>
</div>

<div style="width: 786px;margin-top: 19px;">
<?php
	
	foreach ($stmt as $row) {
		echo '<p style="margin-bottom: 12px;" class="fdsafdasppp"><a href="/ae.php?id='.$row['id'];
		echo '" class="adfsas">【修改】</a> ';
		echo '<a href="/zp.php?id='.$row['id'].'&name='.$row['name'];
		echo '" class="adfsas">【作品】</a>';
		if($row['admim']==1) echo '<span style="color:blue;font-weight: bolder;">管理员</span> ';
		echo $row['id'].' 用户名:<span style="background: green;color: #fff;">'.$row['name'].'</span> 状态:';
		if($row['satus']==1) echo '<span style="color:red;">正常</span>';
		else echo '<span style="color:green;">禁用</span>';
		echo ' 注册时间:'.date('Y-m-d H:i:s',$row['ctime']);
		echo ' 部门';
		if($row['bumen']==1) echo '设计部';
		else if($row['bumen']==2) echo '网页';
		echo '</p>';
	}
?>
</div>





</div>
</body>

</html>