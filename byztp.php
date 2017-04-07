<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	
	$bt=$_POST['bt'];
	$bz=$_POST['bz'];
	$wybt=$_POST['wybt'];
	$wybz=$_POST['wybz'];
	if($bt && $bz){
		$dtime=date('Y',$ttitme);
		$mtime=date('n',$ttitme);
		$dday=date('j',$ttitme);
		$ctime=$ttitme;
		$stmt = $dbh->prepare("INSERT INTO zt (bt, bz,ctime,dtime,mtime,dday,wybt,wybz) VALUES (:bt, :bz,:ctime,:dtime,:mtime,:dday,:wybt,:wybz)");
		
		$stmt->bindParam(':bt', $bt);
		$stmt->bindParam(':bz', $bz);
		$stmt->bindParam(':wybt', $wybt);
		$stmt->bindParam(':wybz', $wybz);
		$stmt->bindParam(':ctime', $ctime);
		$stmt->bindParam(':dtime', $dtime);
		$stmt->bindParam(':mtime', $mtime);
		$stmt->bindParam(':dday', $dday);
		
		
		

		
		if($stmt->execute()) $newwwtestt= '<p style="margin-top: 29px;"><i class="fi-check"></i>添加成功！';
		else $newwwtestt= '<p style="margin-top: 29px;"><i class="fi-x"></i>添加失败！';
	}else $newwwtestt= '<p style="margin-top: 29px;"><i class="fi-x"></i>添加失败！';
	$newwwtestt=$newwwtestt. '3秒后跳转！</p>';
	
	$title='本月主题';
	$mmmdddhh='byzt';
	include 'head.php';
	echo $newwwtestt;
?>
<script> 
setTimeout("location.href = 'byzt.php';",2000);//延时3秒 
</script> 

	
	<?php
	include 'foot.php';
	?>
	