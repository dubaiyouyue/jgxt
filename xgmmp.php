<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
		$title='修改密码';
	$mmmdddhh='xgmm';
	include 'headu.php';
	$stmt = $dbh->prepare('SELECT * from user where uid=:uid limit 1');
	$stmt->execute(array('uid' => $uligon));
	foreach ($stmt as $row) {
		$sssddd[]=$row;
	}
	//if($sssddd['0']['id']) $uligon=$sssddd['0']['id'];
	$pass = md5(md5($_POST['oldpass']).$sssddd['0']['slat']);
	if($pass==$sssddd['0']['pass']){
		$slat=rand(100000,999999);
		$newpass=md5(md5($_POST['newpass']).$slat);
		$stmt = $dbh->prepare("UPDATE user SET pass = :pass,loginslat=:loginslat,slat=:slat WHERE id = :id limit 1");
		$stmt->bindParam(':loginslat', $loginslatnew);
		$stmt->bindParam(':slat', $slat);
		$stmt->bindParam(':pass', $newpass);
		$stmt->bindParam(':id', $sssddd['0']['id']);
		if($stmt->execute()){
			setcookie("loginslat", '', time()-36000000);
			setcookie("id", '', time()-36000000);
			$newwwtestt= '<p style="margin-top: 29px;"><i class="fi-check"></i>修改密码成功！请重新登录！';
		}
	}
	else $newwwtestt= '<p style="margin-top: 29px;"><i class="fi-x"></i>密码修改失败！';
	echo $newwwtestt=$newwwtestt. '3秒后跳转！</p>';
?>
<script> 
setTimeout("location.href = 'xgmm.php';",3000);//延时3秒 
</script> <?php
	include 'foot.php';
	?>