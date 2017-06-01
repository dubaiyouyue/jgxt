<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	
	$dtime=date('Y',$ttitme);
	$mtime=date('n',$ttitme);
	
	if(($_GET['d']+0) && ($_GET['m']+0)){
		$dtime=$_GET['d'];
		$mtime=$_GET['m'];
	}
	
	
	$stmt = $dbh->prepare('SELECT * from user where satus=:satus and (bumen=1 or bumen=2)');
	$satus=1;
	$stmt->execute(array(':satus' => $satus));

	foreach ($stmt as $row) {
		$row['tpnum']=0;
		$row['dpnum']=0;
		$sssdddindex[]=$row;
		
	}
	/*foreach($sssdddindex as $k=>$v){
		/*if($alluid) $alluid.=','.$v['id'];
		else $alluid=$v['id'];*/
		/*$sssdddindexss[$v['id']]=$v;
	}*/
	//$sssdddindex=$sssdddindex['0'];
	//$alluid_arr=explode(',',$alluid);
	
	$stmtlist = $dbh->prepare('SELECT * from p where dtime=:dtime and mtime=:mtime');
	
	//$stmtlist->bindParam(':alluid', $alluid);
	$stmtlist->bindParam(':dtime', $dtime);
	$stmtlist->bindParam(':mtime', $mtime);
	
	$stmtlist->execute();
	foreach ($stmtlist as $row) {
		$listall[]=$row;
	}
	//print_r($listall);exit;
	foreach ($listall as $k=>$v) {
		$listdd[][$v['uid']]=$v;
		$list[$v['uid']]=$v;
	}
	
	$tp_arr_sj=array();//修复部门作品空值时候投票统计数
	$tp_arr_wy=array();//20170531
	
	foreach ($listdd as $k=>$v) {
		
		foreach($sssdddindex as $ku=>&$vu){
			
			if($v[$vu['id']]['uid']==$vu['id']){
				$vu['tpnum']=$vu['tpnum']+$v[$vu['id']]['tp'];
				$vu['dpnum']=$vu['dpnum']+$v[$vu['id']]['dp'];
				if($vu['bumen']==1) $tp_arr_sj[$v[$vu['id']]['uid']]=$vu['tpnum'];
				if($vu['bumen']==2) $tp_arr_wy[$v[$vu['id']]['uid']]=$vu['tpnum'];
			}
		}
	}
	arsort($tp_arr_sj);
	arsort($tp_arr_wy);
	//if($tp_arr_sj && $tp_arr_wy)  //修复部门作品空值时候投票统计数 20170531
	$tp_arr=$tp_arr_sj+$tp_arr_wy;
	//dump($sssdddindex);exit;
	
	$title='投票链接';
	$mmmdddhh='tplj';
	include 'head.php';
?>

<p style="margin-top: 29px;"><i class="fi-share"></i>投票链接</p>
<form action="tpljp.php" method="GET">
<p><i class="fi-unlink"></i>过期:<?php
	echo date('Y-m-d H:i:s',$conf['ss']);
?></p>
<p><i class="fi-link"></i>链接:<input type="text" value="http://team.test2.resonance.net.cn/?v=<?php
	echo $conf['tplj'];
?>" /> <a href="/?v=<?php
	echo $conf['tplj'];
?>" target="_blank">访问</a> <?php
	if($conf['ss']<$ttitme) echo '<span style="color:red;">(已过期)</span>';
	else echo '有效';
?></p>
<p><i class="fi-clock"></i>时效:<input type="text" name="ss" value="<?php
	echo $conf['ssh'];
?>" />小时</p>
<input type="submit" value="重新生成" class="button success" />
<p><i class="fi-info" style="color: red;"></i>重新生成链接，旧投票链接将会失效。</p>
</form>

<p style="margin-top: 29px;"><i class="fi-graph-bar"></i>作品投票 <span style="float: right;cursor: pointer;color: red;" id="test1"><i class="fi-clock"></i> <?php echo $dtime.'年'.$mtime.'月';?>

<select id="dtime" style="width: 79px;">
<?php
	echo '<option value="'.$dtime.'">'.$dtime.'年</option>';
	for($in=2017;$in<2031;$in++){
		if($dtime!= $in) echo '<option value="'.$in.'">'.$in.'年</option>';
	}
?>
</select>
<select id="mtime" style="width: 79px;">
<?php
	echo '<option value="'.$mtime.'">'.$mtime.'月</option>';
	for($im=1;$im<13;$im++){
		if($mtime!= $im) echo '<option value="'.$im.'">'.$im.'月</option>';
	}
?>
</select>

</span></p>


<script> 
$(document).ready(function(){ 
	$('select').change(function(){ 
		var dtime=$("#dtime").val();//这就是selected的值 
		var mtime=$("#mtime").val();//获取本页面其他标签的值 
		 location.href = '?d='+dtime+'&m='+mtime;
	}) 
}) 
</script> 


<table style="width: 100%;">
  <thead>
    <tr>
      <th>UID</th>
      <th>员工</th>
	  <th>部门</th>
	  <th>投票</th>
	  <th>点评</th>
	  <th>作品</th>
    </tr>
  </thead>
  <tbody><?php

	foreach($tp_arr as $kn=>$vn){
		foreach ($sssdddindex as $v) {
			if($v['name'] && $v['bumen']){
				if($kn==$v['id']){
					if($v['bumen']==1){
						$v['bumen']='设计部';
						$sjgj++;
					}
					if($v['bumen']==2){
						$v['bumen']='网页部';
						$wygj++;
					}
					echo '<tr';
					if($sjgj==1 || $wygj==1) echo ' style="background:yellow;" ';
					echo '><td>'.$v['id'].'</td><td>';
					if($v['tpnum'] && ($sjgj==1 || $wygj==1)) echo '<i class="fi-trophy" style="color:red;"></i> ';
					echo $v['name'].'</td><td>'.$v['bumen'].'</td><td><span style="color:green;';
					if($v['tpnum'] && ($sjgj==1 || $wygj==1)) echo 'font-weight: bold;';
					echo '">'.$v['tpnum'].'</span></td><td>'.$v['dpnum'].'</td><td><a href="u/'.$list[$v['id']]['url'].'.jpg" target="_blank">作品</a></td></tr>';
				}
			}

		}
	}
  ?>
    
     
    
    
  </tbody>
</table>






<?php
	include 'foot.php';
	?>
	
	
	