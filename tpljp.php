<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	
	//$lj=$_GET['lj'];
	$ss=$_GET['ss']+0;
	if(!$ss) $ss=24;
	$ssh=$ss;
	$ss=$ttitme+($ss*3600);
	
	$tplj=md5(md5($ttitme.rand(100000,999999)).rand(100000000,999999999));
	
		$stmt = $dbh->prepare("UPDATE conf SET ss=:ss,tplj=:tplj,ssh=:ssh");
		$stmt->bindParam(':ss', $ss);
		$stmt->bindParam(':tplj', $tplj);
		$stmt->bindParam(':ssh', $ssh);
		
		
		if($stmt->execute()) $newwwtestt= '<p style="margin-top: 29px;"><i class="fi-check"></i>生成成功！';
		else $newwwtestt= '<p style="margin-top: 29px;"><i class="fi-x"></i>生成失败！';
	
	$newwwtestt=$newwwtestt. '3秒后跳转！</p>';
	
	$title='投票链接';
	$mmmdddhh='tplj';
	include 'head.php';
	echo $newwwtestt;
?>
<script> 
setTimeout("location.href = 'tplj.php';",2000);//延时3秒 
</script> 
	<?php
	include 'foot.php';
	?>