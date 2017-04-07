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
	
	$tuid=$uligon+0;
	
		//echo $_SESSION['check_pic'];exit;
	/*if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	*/

		if(!$conf['tp']) exit('2');
	
	
	$pid=$_POST['pid']+0;
	$ip=getIP();
		$ip=sprintf('%u',ip2long($ip));
	$puid=$_POST['puid']+0;
	$zt=$stmtusernewbbttt['bt'];
	$bumen=$_POST['bumen']+0;
	
	
	
	
	if(!$pid || !$puid || ($bumen!=1 && $bumen!=2)){
		exit('1');
	}
	
	//$ttitme=time();
	$ctime=$ttitme;
	$dtime=date('Y',$ttitme);
	$mtime=date('n',$ttitme);
	$dday=date('j',$ttitme);
	$num=1;
	
		if(!$uligon){
			//游客:(只能投1个作品1次
			if(!$conf['yktp']){
				$stmtyktp = $dbh->prepare('SELECT * from tp where ip=:ip and dtime=:dtime and mtime=:mtime and bumen=:bumen limit 1');
				$stmtyktp->execute(array(':ip' => $ip,':dtime' => $dtime,':mtime' => $mtime,':bumen' => $bumen));
				foreach ($stmtyktp as $rowyktp) {
					$sssdddyktp[]=$rowyktp;
				}
				if($sssdddyktp['0']['id']) exit('yktpone');
			}else{
				//(能投全部作品1次) 投票
				$stmtyktp = $dbh->prepare('SELECT * from tp where ip=:ip and dtime=:dtime and mtime=:mtime and pid=:pid and bumen=:bumen limit 1');
				$stmtyktp->execute(array(':ip' => $ip,':dtime' => $dtime,':mtime' => $mtime,':pid' => $pid,':bumen' => $bumen));
				foreach ($stmtyktp as $rowyktp) {
					$sssdddyktp[]=$rowyktp;
				}
				if($sssdddyktp['0']['id']) exit('yktpone');
			}
		}else{
			//内部:(只能投1个作品1次) 
			if(!$conf['nbtp']){
				$stmtyktp = $dbh->prepare('SELECT * from tp where tuid=:tuid and dtime=:dtime and mtime=:mtime and bumen=:bumen limit 1');
				$stmtyktp->execute(array(':tuid' => $tuid,':dtime' => $dtime,':mtime' => $mtime,':bumen' => $bumen));
				foreach ($stmtyktp as $rowyktp) {
					$sssdddyktp[]=$rowyktp;
				}
				if($sssdddyktp['0']['id']) exit('yktpone');
			}else{
				//(能投全部作品1次) 投票
				$stmtyktp = $dbh->prepare('SELECT * from tp where tuid=:tuid and dtime=:dtime and mtime=:mtime and pid=:pid and bumen=:bumen limit 1');
				$stmtyktp->execute(array(':tuid' => $tuid,':dtime' => $dtime,':mtime' => $mtime,':pid' => $pid,':bumen' => $bumen));
				foreach ($stmtyktp as $rowyktp) {
					$sssdddyktp[]=$rowyktp;
				}
				if($sssdddyktp['0']['id']) exit('yktpone');
			}
		}
	
	
	
	
	
	

	
	$stmt = $dbh->prepare("INSERT INTO tp (num, pid,ctime,ip,puid,dtime,mtime,dday,zt,tuid,bumen) VALUES (:num, :pid,:ctime,:ip,:puid,:dtime,:mtime,:dday,:zt,:tuid,:bumen)");
	$stmt->bindParam(':num', $num);
	$stmt->bindParam(':bumen', $bumen);
	$stmt->bindParam(':tuid', $tuid);
	$stmt->bindParam(':pid', $pid);
	$stmt->bindParam(':ctime', $ctime);
	$stmt->bindParam(':ip', $ip);
	$stmt->bindParam(':puid', $puid);
	$stmt->bindParam(':dtime', $dtime);
	$stmt->bindParam(':mtime', $mtime);
	$stmt->bindParam(':dday', $dday);
	$stmt->bindParam(':zt', $zt);
	if($stmt->execute()){
		$stmttttp = $dbh->prepare("UPDATE p SET tp=tp+1 where id=:pid limit 1");
		$stmttttp->bindParam(':pid', $pid);
		if($stmttttp->execute()) exit('ok');
	}
	exit('2');