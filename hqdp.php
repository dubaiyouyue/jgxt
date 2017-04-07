<?php

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
	
	$dtime=date('Y',$ttitme);
	$mtime=date('n',$ttitme);
	$puid=$_POST['puid']+0;
	$stmt = $dbh->prepare("SELECT * from dp where puid=:puid and satus=:satus and dtime=:dtime and mtime=:mtime order by id desc");
	$satus=1;
	$stmt->bindParam(':satus', $satus);
	$stmt->bindParam(':dtime', $dtime);
	$stmt->bindParam(':mtime', $mtime);
	$stmt->bindParam(':puid', $puid);
	
	$stmt->execute();
	
	foreach ($stmt as $dplist) {
		$list[]=$dplist;
	}
	if(!$list['0']['id']) exit;
	foreach($list as $k=>$v){
		echo '<p style="font-size:14px;margin-bottom: 0px;"><span style="font-size:16px;"><i class="fi-foot"></i></span> '.$v['content'].' </p><p style="border-bottom: 1px solid #ddd;font-size:12px;color: #ccc;text-align: right;"><i class="fi-clock"></i> '.date('Y-m-d H:i:s',$v['ctime']).'</p>';
	}
	//echo '<p style="color:#fff;">没有了</p>';
	//<button type="button" class="button tiny" onclick="">查看更多</button>