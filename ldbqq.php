<?php
	include 'db.php';
	//print_r($_POST);
	
$name = $_POST['yhm'];
$pass = $_POST['password'];
$code=$_POST['code'];

if(!$name || !$pass || !$code || !$_SESSION['check_pic'])  exit('数据异常！登录失败！请重新刷新验证码！');

if($code!=$_SESSION['check_pic']){
	$_SESSION['check_pic']='';
	exit('验证码错误！请重新刷新验证码！');
}

$stmt = $dbh->prepare('SELECT id,slat,pass,satus,admim from user where name=:name limit 1');
$stmt->execute(array('name' => $name));

foreach ($stmt as $row) {
    $sss[]=$row;
}


if(!$sss['0']['id']) {
	$_SESSION['check_pic']='';
	exit('用户名未注册!登录失败！');
}
if(!$sss['0']['satus']) {
	$_SESSION['check_pic']='';
	exit('用户名被禁止登录使用或未通过审核！');
}

$pass = md5(md5($pass).$sss['0']['slat']);
	if($sss['0']['pass']!=$pass){
		$_SESSION['check_pic']='';
		exit('用户名或密码错误!登录失败！');
	}

$qquid=$_SESSION['qquid'];
$loginslat=md5(md5(rand(100000,999999)).rand(100000,999999));
$stmt = $dbh->prepare("UPDATE user SET loginslat = :loginslat ,qquid=:qquid WHERE id = :id limit 1");
$stmt->bindParam(':loginslat', $loginslat);
$stmt->bindParam(':id', $sss['0']['id']);
$stmt->bindParam(':qquid', $qquid);
$stmt->execute();
	
setcookie("loginslat", $loginslat, time()+36000000);
setcookie("id", $sss['0']['id'], time()+36000000);
	$_SESSION['check_pic']='';
echo '登录成功！3秒后跳转！';
?>
<script> 
setTimeout("location.href = '<?php
	if($sss['0']['admim']==1) echo 'a';
	else echo 'u';
?>.php';",1500);//延时3秒 
</script> 