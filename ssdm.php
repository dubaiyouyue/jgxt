<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	
	$ssid=$uligon;
	$m=19;
	$p=$_GET['p']+0;
	if($p<1) $p=1;
	$mp=($p-1)*$m;
	
	$dtime=$_GET['d']+0;
	$mtime=$_GET['m']+0;
	$stmtall = $dbh->prepare('SELECT id from p where uid=:ssid and dtime=:dtime and mtime=:mtime');
	$stmtall->execute(array(':ssid' => $ssid,':dtime' => $dtime,':mtime' => $mtime));
	//echo $stmtall->rowCount();
	$pageCount = ceil($stmtall->rowCount()/$m);
	
	
	$stmt = $dbh->prepare('SELECT * from p where uid=:ssid and dtime=:dtime and mtime=:mtime order by id desc limit :mp,:m');
	$stmt->bindValue(':mp', $mp, PDO::PARAM_INT);
	$stmt->bindValue(':m', $m, PDO::PARAM_INT);
	$stmt->bindParam(':ssid', $ssid);
	$stmt->bindParam(':dtime', $dtime);
	$stmt->bindParam(':mtime', $mtime);

	$stmt->execute();
	
	
	//print_r($stmtusernew);exit;
	$title=$dtime.'年-'.$mtime.'月主题作品';
	$mmmdddhh='lszt';
	include 'headu.php';

		echo '<p style="margin-top: 29px;"><i class="fi-indent-more"></i>'.$dtime.'年-'.$mtime.'月所有主题作品</p>';
		//$rowCount = $stmt->rowCount()+2;
		foreach ($stmt as $v) {
			//$ii++;
				if(!$v['sm']) $v['sm']='没有填写';
				echo '<p style="margin-bottom:0px;"><span style="color:green;">主题：</span>'.$v['zt'].'</p><p style="margin-bottom:0px;"><span style="color:green;">作品备注说明：</span><a href="/u/';
				echo $v['url'];
				echo '.jpg" target="_blank">'.$v['sm'].'</a></p><p><span style="color:green;">PID:</span>';
				echo $v['id'];
				echo' 时间:'.date('Y-m-d H:i:s',$v['ctime']).' 投票:'.$v['tp'].' 点评:'.$v['dp'];
				echo '</p>';
		}
		
		
?>


<div class="tcdPageCode"></div>
<style>
.tcdPageCode{padding: 15px 20px;text-align: left;color: #ccc;} 
.tcdPageCode a{display: inline-block;color: #428bca;display: inline-block;height: 25px; line-height: 25px; padding: 0 10px;border: 1px solid #ddd; margin: 0 2px;border-radius: 4px;vertical-align: middle;} 
.tcdPageCode a:hover{text-decoration: none;border: 1px solid #428bca;} 
.tcdPageCode span.current{display: inline-block;height: 25px;line-height: 25px;padding: 0 10px;margin: 0 2px;color: #fff;background-color: #428bca; border: 1px solid #428bca;border-radius: 4px;vertical-align: middle;} 
.tcdPageCode span.disabled{ display: inline-block;height: 25px;line-height: 25px;padding: 0 10px;margin: 0 2px; color: #bfbfbf;background: #f2f2f2;border: 1px solid #bfbfbf;border-radius: 4px;vertical-align: middle;} 
</style> 
<script>
$(".tcdPageCode").createPage({ 
  pageCount:<?php
	echo $pageCount;
  ?>, 
  current:<?php
	echo $p;
  ?>, 
  backFn:function(p){ 
   //单击回调方法，p是当前页码 
   location.href = 'ssdm.php?d=<?php echo $dtime;?>&m=<?php echo $mtime;?>&p='+p;
  } 
 }); 
</script>


<?php
	include 'foot.php';
	?>