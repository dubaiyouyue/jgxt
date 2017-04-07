<?php
	include 'db.php';
	//print_r($_POST);
	
if(!$conf['re']) exit;
	
$name = $_POST['yhm'];
if(!$name || !$_POST['password'])  exit('数据异常！注册失败！');

$stmt = $dbh->prepare('SELECT id from user where name=:name limit 1');
$stmt->execute(array('name' => $name));

foreach ($stmt as $row) {
    $sss[]=$row;
}


if($sss['0']['id']) exit('用户名已经被注册!注册失败！');


$qquid=$_SESSION['qquid'];
$stmt = $dbh->prepare("INSERT INTO user (name, pass,slat,ctime,qquid) VALUES (:name, :pass,:slat,:ctime,:qquid)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':pass', $pass);
$stmt->bindParam(':slat', $slat);
$stmt->bindParam(':qquid', $qquid);
$ctime=$ttitme;
$stmt->bindParam(':ctime', $ctime);
// 插入一行
$slat=rand(100000,999999);

$pass = md5(md5($_POST['password']).$slat);
if($name && $pass) $stmt->execute();
else exit('数据异常！注册失败！');
	
echo '注册成功！请等待审核！3秒后跳转！';
?>
<script> 
setTimeout("location.href = 'login.php';",2500);//延时3秒 
</script> 