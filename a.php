<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	
	$stmt = $dbh->prepare('SELECT * from user order by id desc');
	$stmt->execute();
	foreach($stmt as $row){
		$newuser[$row['id']]=$row;
	}

	$dtime=date('Y',$ttitme);
	$mtime=date('n',$ttitme);
	$stmt = $dbh->prepare('SELECT * from p where dtime=:dtime and mtime=:mtime order by id desc');
	$stmt->execute(array('dtime' => $dtime,'mtime'=>$mtime));
	foreach($stmt as $row){
		$cjrs[$row['uid']][]=$row['id'];
		$zxgcs[]=$row;
		$ztp=$ztp+$row['tp'];
		$zdp=$zdp+$row['dp'];
	}
	$cjrs=count($cjrs);
	$zxgcsnum=count($zxgcs);
	//print_r($newuser[18][0]['id']);exit;
	$title='管理员（'.$user_arr['name'].'）';
	include 'head.php';
	
	$jd=round(((date('j',$ttitme)/(date('t',$ttitme)))),2)*100;
	
	?>

<div style="padding:20px;">
	<h3>本月项目主题</h3>
	<p class="newbotttom0px"><i class="fi-flag"></i>设计部</p>
	<p class="newbotttom0px"><i class="fi-projection-screen"></i> <span style="color:green;"><?php
		echo $stmtusernewbbttt['bt'];
	?></span></p><p><i class="fi-info"></i> <?php
		echo $stmtusernewbbttt['bz'];
	?></p>
	<p class="newbotttom0px"><i class="fi-flag"></i>网页部</p>
	<p class="newbotttom0px"><i class="fi-projection-screen"></i> <span style="color:green;"><?php
		echo $stmtusernewbbttt['wybt'];
	?></span></p><p><i class="fi-info"></i> <?php
		echo $stmtusernewbbttt['wybz'];
	?></p>

	
  <h3>项目时间进度</h3>
<style>
  .percentage {
    position: absolute;
    top: 50%;
    left: 50%;
    color: white; 
    transform: translate(-50%, -50%);
    font-size: 12px;
  }.newbotttom0px{margin-bottom:0px;}
  </style>
  <div class="progress success">
    <span class="meter" style="position:relative;width:<?php echo $jd;?>%">
      <span class="percentage"><?php echo $jd;?>%</span>
    </span>
  </div>
  
  
  <h3>项目投票链接</h3>
  <p class="newbotttom0px"><i class="fi-key"></i> <a href="<?php
	echo '/?v='.$conf['tplj'];
?>" target="_blank">http://team.test2.resonance.net.cn/?v=<?php
	echo $conf['tplj'];
?></a></p>
  <p class="newbotttom0px"><i class="fi-battery-half"></i>有效时间：<?php
	echo date('Y-m-d H:i:s',$conf['ss']);
?></p>
  <p><i class="fi-target"></i>当前状态：<?php
	if($conf['ss']<$ttitme) echo '<span style="color:red;">(已过期)</span>';
	else echo '有效';
?></p>
  
  
	<h3>项目交稿统计</h3>
	<p><i class="fi-torsos"></i>参与人数：<?php echo $cjrs+0;?>人 | <i class="fi-page-multiple"></i>稿件：<?php echo $cjrs+0;?>件 | <i class="fi-page-edit"></i>总修改：<?php echo $zxgcsnum+0;?>次 | <i class="fi-trophy"></i>总投票：<?php echo $ztp+0;?>次 | <i class="fi-eye"></i>总点评：<?php echo $zdp+0;?>次</p>
	<p><i class="fi-results-demographics"></i>今日最新修改：</p>
	<?php
		//$nnsscount=count($zxgcs);
		foreach($zxgcs as $k=>$v){
			if(!$v['sm']) $v['sm']='没有填写';
			if(date('Y-m-d',$v['ctime'])==date('Y-m-d',$ttitme)){
				echo '<p class="newbotttom0px"><span style="color:green;">主题：</span>'.$v['zt'].'</p><p style="margin-bottom:0px;"><span style="color:green;">作品备注说明：</span>'.$v['sm'].'</P><p><span style="color:green;">PID:</span>'.$v['id'].' <a href="/u/';
				echo $v['url'];
				echo '.jpg" target="_blank">';
				if($newuser[$v['uid']]['bumen']==2) echo '网页部';
				if($newuser[$v['uid']]['bumen']==1) echo '设计部';
				echo ':';
				echo $newuser[$v['uid']]['name'];
				echo ' 时间:'.date('Y-m-d H:i:s',$v['ctime']).' 投票:'.$v['tp'].' 点评:'.$v['dp'];
				echo '</a></p>';
			}
		}
	?>
	
 
</div>
<?php
	include 'foot.php';
	?>