<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	//print_r($_POST);exit;
	$id=$_POST['id']+0;
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
		if($stmt->execute()) $newwwtestt= '<p style="margin-top: 29px;"><i class="fi-check"></i>修改 '.$name.' 成功！';
		else $newwwtestt= '<p style="margin-top: 29px;"><i class="fi-x"></i>修改失败！';
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
		if($stmt->execute()) $newwwtestt= '<p style="margin-top: 29px;"><i class="fi-check"></i>修改 '.$name.'（修改密码）成功！';
		else $newwwtestt= '<p style="margin-top: 29px;"><i class="fi-x"></i>修改失败！';
	}
	$newwwtestt=$newwwtestt. '3秒后跳转！</p>';
	
	$title='会员管理';
	$mmmdddhh='user';
	include 'head.php';
	echo $newwwtestt;
?>
<script> 
setTimeout("location.href = 'user.php';",2000);//延时3秒 
</script> 

	
	
	<?php
	include 'foot.php';
	?>