<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	$qtdjs=$_POST['qtdjs'];
	$re=$_POST['re'];
	$sy=$_POST['sy'];
	$my=$_POST['my']+0;
	$tp=$_POST['tp'];
	$dp=$_POST['dp'];
	$yktp=$_POST['yktp'];
	$nbtp=$_POST['nbtp'];
	
	$sykd=$_POST['sykd']+0;
	$sygd=$_POST['sygd']+0;
	$syzb=$_POST['syzb']+0;
	$syyb=$_POST['syyb']+0;
	$syxz=$_POST['syxz']+0;
	$syxzss=$_POST['syxzss'];
	$syys=$_POST['syys'];
	$syxzssf=$_POST['syxzssf'];
	
		$stmt = $dbh->prepare("UPDATE conf SET re=:re,sy=:sy,my=:my,dp=:dp,tp=:tp,yktp=:yktp,nbtp=:nbtp,sygd=:sygd,sykd=:sykd,syzb=:syzb,syyb=:syyb,syxz=:syxz,syxzss=:syxzss,syys=:syys,syxzssf=:syxzssf,qtdjs=:qtdjs");
		$stmt->bindParam(':sy', $sy);
		$stmt->bindParam(':qtdjs', $qtdjs);
		$stmt->bindParam(':re', $re);
		$stmt->bindParam(':dp', $dp);
		$stmt->bindParam(':my', $my);
		$stmt->bindParam(':tp', $tp);
		$stmt->bindParam(':syxz', $syxz);
		$stmt->bindParam(':syxzss', $syxzss);
		$stmt->bindParam(':syyb', $syyb);
		$stmt->bindParam(':syzb', $syzb);
		$stmt->bindParam(':sygd', $sygd);
		$stmt->bindParam(':sykd', $sykd);
		$stmt->bindParam(':syys', $syys);
		$stmt->bindParam(':nbtp', $nbtp);
		$stmt->bindParam(':yktp', $yktp);
		$stmt->bindParam(':syxzssf', $syxzssf);
		
		

		
		if($stmt->execute()) $newwwtestt= '<p style="margin-top: 29px;"><i class="fi-check"></i>修改成功！';
		else $newwwtestt= '<p style="margin-top: 29px;"><i class="fi-x"></i>修改失败！';
	
	$newwwtestt=$newwwtestt. '3秒后跳转！</p>';
	
	$title='系统设置';
	$mmmdddhh='aset';
	include 'head.php';
	echo $newwwtestt;
?>
<script> 
setTimeout("location.href = 'aset.php';",2000);//延时3秒 
</script> 

	
	<?php
	include 'foot.php';
	?>
	