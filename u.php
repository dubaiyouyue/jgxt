<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	
	


	$dtime=date('Y',$ttitme);
	$mtime=date('n',$ttitme);
	$stmt = $dbh->prepare('SELECT * from p where dtime=:dtime and mtime=:mtime and uid=:uid order by id desc');
	$stmt->execute(array('dtime' => $dtime,'mtime'=>$mtime,'uid'=>$uligon));

	
	$stmtfm = $dbh->prepare('SELECT * from fm where dtime=:dtime and mtime=:mtime and uid=:uid order by id desc');
	$stmtfm->execute(array('dtime' => $dtime,'mtime'=>$mtime,'uid'=>$uligon));
	foreach($stmtfm as $rowfm){
		$zxgcsfm[]=$rowfm;
	}
	$newfm=$zxgcsfm['0']['url'];
	if(!$newfm) $newfmurl='35574339ab3c813.jpg';
	else $newfmurl='u/'.$newfm.'.jpg';
	
	foreach($stmt as $row){
		
		$zxgcs[]=$row;
		$ztp=$ztp+$row['tp'];
		$zdp=$zdp+$row['dp'];
	}
	
	$zxgcsnum=count($zxgcs);
	//print_r($zxgcs);exit;
	$title=$user_arr['name'];
	include 'headu.php';
	
	$jd=round(((date('j',$ttitme)/(date('t',$ttitme)))),2)*100;
	
	?>

<div style="padding:20px;">

	<h3>本月项目主题</h3>
	<div <?php
		if($user_arr['bumen']==2) echo 'style="display:none;" ';
	?>><p class="newbotttom0px"><i class="fi-flag"></i>设计部</p>
	<p class="newbotttom0px"><i class="fi-projection-screen"></i> <span style="color:green;"><?php
		echo $stmtusernewbbttt['bt'];
	?></span></p><p><i class="fi-info"></i> <?php
		echo $stmtusernewbbttt['bz'];
	?></p></div>
	
	
	<div <?php
		if($user_arr['bumen']==1) echo 'style="display:none;" ';
	?>><p class="newbotttom0px"><i class="fi-flag"></i>网页部</p>
	<p class="newbotttom0px"><i class="fi-projection-screen"></i> <span style="color:green;"><?php
		echo $stmtusernewbbttt['wybt'];
	?></span></p><p><i class="fi-info"></i> <?php
		echo $stmtusernewbbttt['wybz'];
	?></p></div>

	
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
  
  

  
  
	
	<p><i class="fi-page-edit"></i>总修改：<?php echo $zxgcsnum+0;?>次 | <i class="fi-trophy"></i>总投票：<?php echo $ztp+0;?>次 | <i class="fi-eye"></i>总点评：<?php echo $zdp+0;?>次</p>
	
	<p><input type="text" value="" id="sdfsaassss" placeholder="请输入作品备注说明关键词" /><button type="button" class="button tiny" onclick="asdfsdsss();">搜索</button></p>
	
	<p><i class="fi-layout"></i>项目封面 <a href="javascript:;" onclick="upfengmian();" style="font-size:12px;<?php
	if(date('j',$ttitme)>($conf['my']-1)) echo 'display:none;';
?>"><i class="fi-paint-bucket"></i>修改</a></p>
	<p><img src="<?php echo $newfmurl;?>" width="354" height="249" /></p><!--style="height: 180px;"-->
	
	<p class="newbotttom0px"><i class="fi-checkbox"></i>最新作品修改版本：</p>
	<?php
		
		foreach($zxgcs as $k=>$v){
			//if(date('Y-m-d',$v['ctime'])==date('Y-m-d',$ttitme)){
			if($k<5){
				if(!$v['sm']) $v['sm']='没有填写';
				echo '<p class="newbotttom0px"><span style="color:green;">主题：</span>'.$v['zt'].'</p><p style="margin-bottom:0px;"><span style="color:green;">作品备注说明：</span><a href="/u/';
				echo $v['url'];
				echo '.jpg" target="_blank">'.$v['sm'].'</a></P><p><span style="color:green;">PID:</span>'.$v['id'].' 时间:'.date('Y-m-d H:i:s',$v['ctime']).' 投票:'.$v['tp'].' 点评:'.$v['dp'];
				echo '</p>';
			}
		}
	?>
	
 
</div>


<script>

function upfengmian(){
	//页面层
	layer.open({
	  type: 1,
	  title:'提示',
	  skin: 'layui-layer-rim', //加上边框
	  area: ['450px', '320px'], //宽高
	  content: '<form style="width: 79%;margin: auto;margin-top: 20px;" action="upload_file.php" method="post" enctype="multipart/form-data" id="upprrsss" name="upprrsss" ><p><i class="fi-photo"></i>请选择要上传的封面图片</p><p><input type="file" id="file" name="file" /></p><p class="pb10" style="color:red;display:none;" id="zesscc">正在上传...</p><p style="<?php
	if(date('j',$ttitme)>($conf['my']-1)) echo 'display:none;';
?>"><input type="button" value="提交" class="button success tiny" onclick="dasfas();" id="submitdsfsd"></p><p class="pb10" style="font-size: 12px;color: #999;"><i class="fi-info" style="font-size: 14px;color: #000;"></i>图片上传进度请看浏览器左下角,<span style="<?php
	if(date('j',$ttitme)>($conf['my']-1)) echo 'color:red;';
?>">每月作品<?php
	echo $conf['my'];
?>号之后禁止修改</span></p></form>'
	});
}
function dasfas(){
	var file=$('#file').val();
	if(file){
		$('#submitdsfsd').hide();
		$('#zesscc').show();
		document.getElementById("upprrsss").submit();
	}else{
		layer.alert('请选择要上传的封面图片',{title:'提示'});    
	}
}
function asdfsdsss(){
	var keys=$('#sdfsaassss').val();
	if(keys) location.href = '/ss.php?k='+keys;
	else{
		layer.alert('请输入关键词',{title:'提示'});    
	}
}
</script>







<?php
	include 'foot.php';
	?>