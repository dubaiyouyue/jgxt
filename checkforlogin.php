<?php
include 'db.php';
//print_r($_SESSION);qquid
	$qquid=$_SESSION['qquid'];
	$stmt = $dbh->prepare('SELECT * from user where qquid=:qquid limit 1');
	$stmt->execute(array('qquid' => $qquid));
	foreach ($stmt as $row) {
		$sssdddqq[]=$row;
	}
	$sssdddqq=$sssdddqq['0'];
	if($sssdddqq['id']){
		$loginslat=md5(md5(rand(100000,999999)).rand(100000,999999));
		$stmt = $dbh->prepare("UPDATE user SET loginslat = :loginslat WHERE id = :id limit 1");
		$stmt->bindParam(':loginslat', $loginslat);
		$stmt->bindParam(':id', $sssdddqq['id']);
		$stmt->execute();
	
		setcookie("loginslat", $loginslat, time()+36000000);
		setcookie("id", $sssdddqq['id'], time()+36000000);
		if($sssdddqq['admim']) header('Location:/a.php');
		else header('Location:/u.php');
		exit;
	}else{
		header('Location:/lbd.php');
		exit;
	}