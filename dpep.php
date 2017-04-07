<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	
	$content=$_POST['content'];
	$satus=$_POST['satus'];
	$id=$_POST['id'];
	$pid=$_POST['pid'];
		$stmt = $dbh->prepare("UPDATE dp SET content=:content,satus=:satus where id=:id limit 1");
		$stmt->bindParam(':content', $content);
		$stmt->bindParam(':satus', $satus);
		$stmt->bindParam(':id', $id);

		
		

		
		if($stmt->execute()){
			$stmtdp = $dbh->prepare('SELECT id from dp where pid=:pid and satus=:satus');
			$satus=1;
			$stmtdp->bindParam(':satus', $satus);
			$stmtdp->bindParam(':pid', $pid);
			if($stmtdp->execute()){
				foreach ($stmtdp as $row) {
					$sssdddttpp[]=$row;
				}
				$dpnum=count($sssdddttpp);
				
				$stmtdpnum = $dbh->prepare("UPDATE p SET dp=:dpnum where id=:pid limit 1");
				$stmtdpnum->bindParam(':pid', $pid);
				$stmtdpnum->bindParam(':dpnum', $dpnum);
				if($stmtdpnum->execute()){
					$newwwtestt= '<p style="margin-top: 29px;"><i class="fi-check"></i>修改成功！';
				}else $newwwtestt= '<p style="margin-top: 29px;"><i class="fi-x"></i>修改失败！';
			}
		}
		else $newwwtestt= '<p style="margin-top: 29px;"><i class="fi-x"></i>修改失败！';
	
	$newwwtestt=$newwwtestt. '3秒后跳转！</p>';
	
	$title='点评审核';
	$mmmdddhh='dp';
	include 'head.php';
	echo $newwwtestt;
?>
<script> 
setTimeout("location.href = 'dp.php';",2000);//延时3秒 
</script> 

	
	<?php
	include 'foot.php';
	?>
	