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
$im = new imagick();
$im->newimage( $conf['sykd'], $conf['sygd'], new imagickpixel( "none" ) ); 
$draw = new imagickdraw(); 
$draw->setfillcolor(new imagickpixel( $conf['syys'] ));
//$draw->setgravity(imagick::gravity_northwest);
$draw->setFont('simsun.ttc');
$waterText=$conf['sy'];
$draw->annotation($conf['syzb'],$conf['syyb'] ,$waterText);
//$draw->setgravity(imagick::gravity_southeast);
//$draw->annotation(5,15 ,'copyright');
$im->drawimage( $draw); 

$syxzsssyxzss=$conf['syxz'];
if($conf['syxzss']) $syxzsssyxzss=rand(-360,360);
$im->rotateImage(new ImagickPixel('none'), $syxzsssyxzss);

$image = $image->textureimage($im);
//$image->compositeimage($image,imagick::composite_copy,0,0);
//header( "content-type: image/{$image->getimageformat()}" );
$nwff=md5(md5(md5($file).rand(100000,999999).$ttitme).rand(1000000,9999999));
$immmok= $image->writeimage('u/'.$nwff.'.jpg');
$image->clear();
$image->destroy();
//imagejpeg($im);

if($immmok){
	$stmt = $dbh->prepare("INSERT INTO p (uid, url,ctime,dtime,mtime,dday) VALUES (:uid, :url,:ctime,:dtime,:mtime,:dday)");
	$stmt->bindParam(':uid', $uligon);
	$stmt->bindParam(':url', $nwff);
	$dtime=date('Y',$ttitme);
	$mtime=date('n',$ttitme);
	$ctime=$ttitme;
	$dday=date('j',$ttitme);
	$stmt->bindParam(':dtime', $dtime);
	$stmt->bindParam(':mtime', $mtime);
	$stmt->bindParam(':ctime', $ctime);
	$stmt->bindParam(':dday', $dday);
	$stmt->execute();
	echo '上传成功！3秒后跳转！<script>setTimeout("location.href = \'u.php?mm=by\';",2000);</script>';
	exit;
}
exit('上传失败！');
?>