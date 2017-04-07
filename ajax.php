<?php
	include 'db.php';
	
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	
	if($_GET['mm']=='by'){
		$stmt = $dbh->prepare('SELECT * from p where uid=:uid order by id desc limit 1');
		$stmt->execute(array('uid' => $uligon));

		foreach ($stmt as $row) {
			$sssppp[]=$row;
		}
		$purl='204621_Q4IV_2353202';
			if($sssppp['0']['url']){
				$purl=$sssppp['0']['url'];
			}
		echo '<p class="pb10"><img src="/u/'.$purl.'.jpg" width="100%" /></p>';
	}
	else if($_GET['mm']=='bb'){
		$stmt = $dbh->prepare('SELECT * from p where uid=:uid and dtime=:dtime and mtime=:mtime order by id desc');
		
		$dtime=date('Y',$ttitme);
		$mtime=date('n',$ttitme);
		$stmt->execute(array('uid' => $uligon,'dtime' => $dtime,'mtime' => $mtime));
	
		$ii=1;
		echo '<ul style="width: 459px;">';
			
			$rowCount = $stmt->rowCount()+2;
		foreach ($stmt as $row) {
			echo '<li class="sdfsdlbbb" onclick="ssfs(\''.$row['url'].'\');">';
			$ii++;
			echo $rowCount-$ii;
			echo ' 时间'.date('Y-m-d H:i:s',$row['ctime']).' 投票'.$row['tp'].' 点评'.$row['dp'];
			echo '</li>';
		}
		echo '</ul>';
	}	else if($_GET['mm']=='ss'){
		$stmt = $dbh->prepare('SELECT * from p where uid=:uid order by id desc');
		

		$stmt->execute(array('uid' => $uligon));
	
		$ii=1;
		echo '<ul style="width: 459px;">';
		$rowCount = $stmt->rowCount()+2;
		foreach ($stmt as $row) {
			echo '<li class="sdfsdlbbb" onclick="ssfs(\''.$row['url'].'\');">';
			$ii++;
			echo $rowCount-$ii;
			echo ' 时间'.date('Y-m-d H:i:s',$row['ctime']).' 投票'.$row['tp'].' 点评'.$row['dp'];
			echo '</li>';
		}
		echo '</ul>';
	}else if($_GET['mm']=='xgmm'){
		echo '<form action="xgmm.php"><p>旧密码：<input type="text" name="oldpass"></p><p>新密码：<input type="text" name="newpass"></p><p><input type="submit" value="修改"></p></form>';
	}
?>