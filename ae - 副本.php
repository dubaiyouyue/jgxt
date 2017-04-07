<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	
	$ssid=$_GET['id']+0;
	$stmt = $dbh->prepare('SELECT * from user where id=:ssid limit 1');
	$stmt->execute(array('ssid' => $ssid));

	$sssddd=array();
	foreach ($stmt as $row) {
		$sssddd[]=$row;
	}
	
	$sssddd=$sssddd['0'];
?>
<!DOCTYPE html>
<html>
<head>
<title>修改 <?php
	echo $sssddd['name'];
?></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

<body>

<form action="aep.php" method="POST">
<p>用户: <input readonly="readonly" style="border: none;" name="name" value="<?php
	echo $sssddd['name'];
?>"></p>
<p>密码: <input type="text" name="pass">（留空不修改）</p>
<input type="hidden" name="id" value="<?php
	echo $ssid;
?>">
<p>部门: <select name="bumen">
<option><?php
	if($sssddd['bumen']==1) echo '设计部';
	else if($sssddd['bumen']==2) echo '网页';
?> </option>
  <option value ="1">设计部</option>
  <option value ="2">网页</option>
</select></p>

<p>权限: <input type="radio" <?php
	if($sssddd['admim']==0) echo 'checked="checked"';
?> name="admim" value="0" />员工 <input type="radio" <?php
	if($sssddd['admim']==1) echo 'checked="checked"';
?> name="admim" value="1" />管理员</p>

<p>审核: <input type="radio" <?php
	if($sssddd['satus']==0) echo 'checked="checked"';
?> name="satus" value="0" />禁用 <input type="radio" name="satus" <?php
	if($sssddd['satus']==1) echo 'checked="checked"';
?>  value="1" />通过</p>

<input type="submit" value="修改"><p><a href="/a.php">返回</a></p>
</form>

</body>
</html>