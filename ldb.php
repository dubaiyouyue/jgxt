<?php
	include 'db.php';
	//print_r($_POST);
	
$name = $_POST['yhm'];
$pass = $_POST['password'];
$code=$_POST['code'];

if(!$name || !$pass || !$code || !$_SESSION['check_pic'])  exit('1');

if($code!=$_SESSION['check_pic']){
	$_SESSION['check_pic']='';
	exit('2');
}

$stmt = $dbh->prepare('SELECT id,slat,pass,satus,admim from user where name=:name limit 1');
$stmt->execute(array('name' => $name));

foreach ($stmt as $row) {
    $sss[]=$row;
}


if(!$sss['0']['id']) {
	$_SESSION['check_pic']='';
	exit('3');
}
if(!$sss['0']['satus']) {
	$_SESSION['check_pic']='';
	exit('4');
}

$pass = md5(md5($pass).$sss['0']['slat']);
	if($sss['0']['pass']!=$pass){
		$_SESSION['check_pic']='';
		exit('5');
	}

$qquid=$_SESSION['qquid'];

if($qquid){
	$stmt = $dbh->prepare('SELECT id from user where qquid=:qquid limit 1');
	$stmt->execute(array('qquid' => $qquid));
	foreach ($stmt as $row) {
		$sssdddqq[]=$row;
	}
	$sssdddqq=$sssdddqq['0'];
	if($sssdddqq['id']){
		$qquid=0;
	}
}else{
	$qquid=0;
}




$loginslat=md5(md5(rand(100000,999999)).rand(100000,999999));
$stmt = $dbh->prepare("UPDATE user SET loginslat = :loginslat ,qquid=:qquid WHERE id = :id limit 1");
$stmt->bindParam(':loginslat', $loginslat);
$stmt->bindParam(':id', $sss['0']['id']);
$stmt->bindParam(':qquid', $qquid);
$stmt->execute();
	
setcookie("loginslat", $loginslat, time()+36000000);
setcookie("id", $sss['0']['id'], time()+36000000);
	$_SESSION['check_pic']='';
	exit('ok'.$sss['0']['admim']);
echo '登录成功！3秒后跳转！';
?>
<script> 
setTimeout("location.href = '<?php
	if($sss['0']['admim']==1) echo 'a';
	else echo 'u';
?>.php';",1500);//延时3秒 
</script> 