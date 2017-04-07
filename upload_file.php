<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if(date('j',$ttitme)>$conf['my']) exit('本月作品'.$conf['my'].'号之后禁止修改！');
$file=$_FILES["file"]["tmp_name"];
if(!$file) exit('图片上传失败！');
$image = new imagick($file); 
$nwff=md5(md5(md5($file).rand(100000,999999).$ttitme).rand(1000000,9999999));
$immmok= $image->writeimage('u/'.$nwff.'.jpg');
$image->clear();
$image->destroy();
//imagejpeg($im);

if($immmok){
	$stmt = $dbh->prepare("INSERT INTO fm (uid, url,ctime,dtime,mtime,zt,bz,dday,bumen) VALUES (:uid, :url,:ctime,:dtime,:mtime,:zt,:bz,:dday,:bumen)");
	$stmt->bindParam(':uid', $uligon);
	$stmt->bindParam(':url', $nwff);
	
	$stmt->bindParam(':zt', $stmtusernewbbttt['bt']);
	$stmt->bindParam(':bz', $stmtusernewbbttt['bz']);
	$stmt->bindParam(':bumen', $user_arr['bumen']);
	/*$dtime=date('Y',$ttitme);
	$mtime=date('n',$ttitme);
	$ctime=$ttitme;
	$dday=date('j',$ttitme);*/
	
	//$ttitme=$ttitme;
	$ctime=$ttitme;
	$dtime=date('Y',$ttitme);
	$mtime=date('n',$ttitme);
	$dday=date('j',$ttitme);
	
	
	
	$stmt->bindParam(':dtime', $dtime);
	$stmt->bindParam(':mtime', $mtime);
	$stmt->bindParam(':ctime', $ctime);
	$stmt->bindParam(':dday', $dday);
	$stmt->execute();
	
	/*$title='会员管理';
	$mmmdddhh='up';
	include 'headu.php';
	echo '<p style="margin-top: 29px;"><i class="fi-check" style="color:green;"></i>上传成功！3秒后跳转！</p><script>setTimeout("location.href = \'u.php?mm=by\';",2000);</script>';
	

	include 'foot.php';*/
	header('Location:u.php');
	
	exit;
}
exit('上传失败！');
?>