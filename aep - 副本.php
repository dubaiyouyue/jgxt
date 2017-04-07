<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	
	$id=$_POST['id'];
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$bumen=$_POST['bumen'];
	$admim=$_POST['admim'];
	$satus=$_POST['satus'];
	if(!$pass){
		$stmt = $dbh->prepare("UPDATE user SET bumen=:bumen,admim=:admim,satus=:satus WHERE id = :id limit 1");
		$stmt->bindParam(':bumen', $bumen);
		$stmt->bindParam(':admim', $admim);
		$stmt->bindParam(':satus', $satus);
		$stmt->bindParam(':id', $id);
		if($stmt->execute()) echo '修改 '.$name.' 成功！';
		else echo '修改失败！';
	}else{
		$slat=rand(100000,999999);
		$newpass = md5(md5($pass).$slat);
		$loginslat=0;
		$stmt = $dbh->prepare("UPDATE user SET bumen=:bumen,admim=:admim,satus=:satus,pass=:pass,slat=:slat,loginslat = :loginslat WHERE id = :id limit 1");
		$stmt->bindParam(':bumen', $bumen);
		$stmt->bindParam(':admim', $admim);
		$stmt->bindParam(':satus', $satus);
		$stmt->bindParam(':slat', $slat);
		$stmt->bindParam(':loginslat', $loginslat);
		$stmt->bindParam(':pass', $newpass);
		$stmt->bindParam(':id', $id);
		if($stmt->execute()) echo '修改 '.$name.' 成功！';
		else echo '修改失败！';
	}
	echo '3秒后跳转！';
?>
<script> 
setTimeout("location.href = 'a.php';",2000);//延时3秒 
</script> 

	
	
	