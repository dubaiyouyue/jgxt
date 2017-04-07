<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	
	$dtime=date('Y',$ttitme);
	$mtime=date('n',$ttitme);
	
	$stmt = $dbh->prepare('SELECT * from user where satus=:satus');
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
		//$list[$v['uid']]=$v;
	}
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
	if($conf['ss']<$ttitme) echo '<span style="color:red;">过期</span>';
?></p>
<p><i class="fi-clock"></i>时效:<input type="text" name="ss" value="<?php
	echo $conf['ssh'];
?>" />小时</p>
<input type="submit" value="重新生成" class="button success" />
<p><i class="fi-info"></i>重新生成链接，旧投票链接将会失效。</p>
</form>

<p style="margin-top: 29px;"><i class="fi-graph-bar"></i>作品投票 <span style="float: right;"><i class="fi-clock"></i> <?php echo $dtime.'年'.$mtime.'月';?></span></p>





<table style="width: 100%;">
  <thead>
    <tr>
      <th>UID</th>
      <th>员工</th>
	  <th>部门</th>
	  <th>投票</th>
	  <th>点评</th>
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
					if($sjgj==1 || $wygj==1) echo 'font-weight: bold;';
					echo '">'.$v['tpnum'].'</span></td><td>'.$v['dpnum'].'</td></tr>';
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
	
	
	