<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	
?>
<!DOCTYPE html>
<html>
<head>
<title>投票链接</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

</head>

<body>
<form action="tpljp.php" method="GET">
<p>过期:<?php
	echo date('Y-m-d H:i:s',$conf['ss']);
?></p>
<p>链接:<input type="text" value="http://team.test2.resonance.net.cn/?v=<?php
	echo $conf['tplj'];
?>" /> <a href="/?v=<?php
	echo $conf['tplj'];
?>" target="_blank">访问</a> <?php
	if($conf['ss']<$ttitme) echo '<span style="color:red;">过期</span>';
?></p>
<p>时效:<input type="text" name="ss" value="<?php
	echo $conf['ssh'];
?>" />小时</p>
<input type="submit" value="重新生成" />
<p>重新生成链接，旧投票链接将会失效。</p>
</form>
<p><a href="/a.php">返回</a></p>
</body>

</html>

	
	
	