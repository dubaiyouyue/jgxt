<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	
	$stmt = $dbh->prepare('SELECT * from conf');
	$stmt->execute();

	$sssddd=array();
	foreach ($stmt as $row) {
		$sssddd[]=$row;
	}
	
	$sssddd=$sssddd['0'];
	
	?>
	<!DOCTYPE html><html>
<head>
<title>设置</title><meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

<body>
<form name="input" action="asetp.php" method="POST">
<p>注册:<input type="radio" <?php
	if($sssddd['re']==0) echo 'checked="checked"';
?> name="re" value="0" />关闭 <input type="radio" <?php
	if($sssddd['re']==1) echo 'checked="checked"';
?> name="re" value="1" />开启</p>
<p>水印:<input type="text" name="sy" value="<?php
	echo $sssddd['sy'];?>"></p>
	<p>颜色:<input type="text" name="syys" value="<?php
	echo $sssddd['syys'];?>"></p>
<p>宽度:<input type="text" name="sykd" value="<?php
	echo $sssddd['sykd'];?>"></p>
	
<p>高度:<input type="text" name="sygd" value="<?php
	echo $sssddd['sygd'];?>"></p>
	
<p>左边:<input type="text" name="syzb" value="<?php
	echo $sssddd['syzb'];?>"></p>
	
<p>顶部:<input type="text" name="syyb" value="<?php
	echo $sssddd['syyb'];?>"></p>
	
<p>旋转:<input type="text" name="syxz" value="<?php
	echo $sssddd['syxz'];?>"></p>
	
<p>旋转:<input type="radio" <?php
	if($sssddd['syxzss']==0) echo 'checked="checked"';
?> name="syxzss" value="0" />设置的值 <input type="radio" <?php
	if($sssddd['syxzss']==1) echo 'checked="checked"';
?> name="syxzss" value="1" />随机</p>
<p>方式:<input type="radio" <?php
	if($sssddd['syxzssf']==1) echo 'checked="checked"';
?> name="syxzssf" value="1" />文字水印 <input type="radio" <?php
	if($sssddd['syxzssf']==2) echo 'checked="checked"';
?> name="syxzssf" value="2" />图片水印 <input type="radio" <?php
	if($sssddd['syxzssf']==0) echo 'checked="checked"';
?> name="syxzssf" value="0" />关闭</p>
	
<p>每月:<input type="text" name="my" value="<?php
	echo $sssddd['my'];?>">号之后禁止修改</p>
	
	
	
<p>投票:<input type="radio" <?php
	if($sssddd['tp']==0) echo 'checked="checked"';
?> name="tp" value="0" />关闭 <input type="radio" <?php
	if($sssddd['tp']==1) echo 'checked="checked"';
?> name="tp" value="1" />开启</p>
<p>点评:<input type="radio" <?php
	if($sssddd['dp']==0) echo 'checked="checked"';
?> name="dp" value="0" />关闭 <input type="radio" <?php
	if($sssddd['dp']==1) echo 'checked="checked"';
?> name="dp" value="1" />开启</p>
	
<p>游客:<input type="radio" <?php
	if($sssddd['yktp']==0) echo 'checked="checked"';
?> name="yktp" value="0" />(1个) <input type="radio" <?php
	if($sssddd['yktp']==1) echo 'checked="checked"';
?> name="yktp" value="1" />(无限制) 投票</p>
	
<p>内部:<input type="radio" <?php
	if($sssddd['nbtp']==0) echo 'checked="checked"';
?> name="nbtp" value="0" />(1个) <input type="radio" <?php
	if($sssddd['nbtp']==1) echo 'checked="checked"';
?> name="nbtp" value="1" />(无限制) 投票</p>
	
<p><input type="submit" value="提交"></p>

<p><a href="/a.php">返回</a></p>
</form>

</body>

</html>