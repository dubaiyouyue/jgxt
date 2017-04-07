<?php
	//exit;
	include 'db.php';
	
	if(!$uligon && !$_GET['v']){
		//header('Location:/login.php');
		exit;
	}else if($_GET['v']){
		if(!$uligon && (($_GET['v']!=$conf['tplj']) || ($conf['ss']<$ttitme))){
			//header('Location:/login.php');
			exit;
		}
	}
		if(date('j',$ttitme)<$conf['my'] && $conf['qtdjs']){
			//header('Location:/login.php');
			exit;
		}
		//echo $_SESSION['check_pic'];exit;
	/*if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	*/

		if(!$conf['dp']) exit('2');
	
	$content=$_POST['content'];
	$pid=$_POST['pid']+0;
	$ip=getIP();
		$ip=sprintf('%u',ip2long($ip));
	$puid=$_POST['puid']+0;
	$zt=$stmtusernewbbttt['bt'];
	
	if(!$content || !$pid || !$puid){
		exit('1');
	}
	
	
	//$ttitme=time();
	$ctime=$ttitme;
	$dtime=date('Y',$ttitme);
	$mtime=date('n',$ttitme);
	$dday=date('j',$ttitme);
	
	
	$stmt = $dbh->prepare("INSERT INTO dp (content, pid,ctime,ip,puid,dtime,mtime,dday,zt) VALUES (:content, :pid,:ctime,:ip,:puid,:dtime,:mtime,:dday,:zt)");
	$stmt->bindParam(':content', $content);
	$stmt->bindParam(':pid', $pid);
	$stmt->bindParam(':ctime', $ctime);
	$stmt->bindParam(':ip', $ip);
	$stmt->bindParam(':puid', $puid);
	$stmt->bindParam(':dtime', $dtime);
	$stmt->bindParam(':mtime', $mtime);
	$stmt->bindParam(':dday', $dday);
	$stmt->bindParam(':zt', $zt);
	if($stmt->execute()) exit('ok');
	exit('2');