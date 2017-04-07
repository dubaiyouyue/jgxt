<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	//$ssid=$uligon;
	$m=19;
	$p=$_GET['p']+0;
	if($p<1) $p=1;
	$mp=($p-1)*$m;
	

	
	$stmtall = $dbh->prepare('SELECT id from zt');
	$stmtall->execute();
	//echo $stmtall->rowCount();
	$pageCount = ceil($stmtall->rowCount()/$m);
	
	
	$stmt = $dbh->prepare('SELECT * from zt order by id desc limit :mp,:m');
	$stmt->bindValue(':mp', $mp, PDO::PARAM_INT);
	$stmt->bindValue(':m', $m, PDO::PARAM_INT);


	$stmt->execute();
	
	
	//print_r($stmtusernew);exit;
	$title='历史主题';
	$mmmdddhh='alist';
	include 'head.php';

		echo '<p style="margin-top: 29px;"><i class="fi-foot"></i>历史主题</p>';
		//$rowCount = $stmt->rowCount()+2;
		foreach ($stmt as $v) {
			//$ii++;
				
				echo '<p style="margin-bottom:0px;"><span style="color:green;">主题：</span><a href="assdm.php?d=';
				echo $v['dtime'].'&m='.$v['mtime'];
				echo '">'.$v['bt'].' | '.$v['wybt'].'</a></p><p style="margin-bottom:0px;"><span style="color:green;">要求：</span>'.$v['bz'].' | '.$v['wybz'].'</p><p><span style="color:green;">ID:</span>';
				echo $v['id'];
				echo' <span style="color:green;">创建时间</span> '.date('Y-m-d H:i:s',$v['ctime']).'</p>';
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
   location.href = 'alist.php?p='+p;
  } 
 }); 
</script>


<?php
	include 'foot.php';
	?>