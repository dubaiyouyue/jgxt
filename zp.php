<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	
	$ssid=$_GET['id']+0;
	
	$m=19;
	$p=$_GET['p']+0;
	if($p<1) $p=1;
	$mp=($p-1)*$m;
	
	$stmtall = $dbh->prepare('SELECT id from p where uid=:ssid');
	$stmtall->execute(array(':ssid' => $ssid));
	//echo $stmtall->rowCount();
	$pageCount = ceil($stmtall->rowCount()/$m);
	
	
	$stmt = $dbh->prepare('SELECT * from p where uid=:ssid order by id desc limit :mp,:m');
	$stmt->bindValue(':mp', $mp, PDO::PARAM_INT);
	$stmt->bindValue(':m', $m, PDO::PARAM_INT);
	$stmt->bindParam(':ssid', $ssid);
	$stmt->execute();

	
	$stmtuser = $dbh->prepare('SELECT * from user where id=:ssid limit 1');
	$stmtuser->execute(array('ssid' => $ssid));
	foreach ($stmtuser as $vuser) {
		$stmtusernew[]=$vuser;
	}
	$stmtusernew=$stmtusernew['0'];
	//print_r($stmtusernew);exit;
	$title=$stmtusernew['name'].'-会员作品';
	$mmmdddhh='user';
	include 'head.php';

	
		echo '<p style="margin-top: 29px;"><i class="fi-mountains"></i>'.$stmtusernew['name'].'作品</p>';
		//$rowCount = $stmt->rowCount()+2;
		foreach ($stmt as $v) {
			
				if(!$v['sm']) $v['sm']='没有填写';
				echo '<p style="margin-bottom:0px;"><span style="color:green;">主题：</span>'.$v['zt'].'</p><p style="margin-bottom:0px;"><span style="color:green;">作品备注说明：</span>'.$v['sm'].'</p><p><span style="color:green;">PID:</span>';
				echo $v['id'];
				echo' <a href="/u/';
				echo $v['url'];
				echo '.jpg" target="_blank"> 时间:'.date('Y-m-d H:i:s',$v['ctime']).' 投票:'.$v['tp'].' 点评:'.$v['dp'];
				echo '</a></p>';
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
   location.href = 'zp.php?id=<?php echo $ssid;?>&p='+p;
  } 
 }); 
</script>


<?php
	include 'foot.php';
	?>