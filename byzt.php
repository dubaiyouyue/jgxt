<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	

	
	
	//print_r($stmtusernew);exit;
	$title='本月主题';
	$mmmdddhh='byzt';
	include 'head.php';
?>
<p style="margin-top: 29px;"><i class="fi-plus"></i>本月主题编辑</p>

<form action="byztp.php" method="POST">
<p style="margin-bottom:0px;"><i class="fi-flag"></i>设计部</p>
<p style="margin-bottom:0px;"><i class="fi-pencil"></i>标题：<input type="text" name="bt" value="<?php
	echo $stmtusernewbbttt['bt'];
?>" style="margin-bottom:0px;"></p>
<p><i class="fi-info"></i>要求：<input type="text" name="bz" value="<?php
	echo $stmtusernewbbttt['bz'];
?>"></p>
<p style="margin-bottom:0px;"><i class="fi-flag"></i>网页部</p>
<p style="margin-bottom:0px;"><i class="fi-pencil"></i>标题：<input type="text" name="wybt" value="<?php
	echo $stmtusernewbbttt['wybt'];
?>" style="margin-bottom:0px;"></p>
<p><i class="fi-info"></i>要求：<input type="text" name="wybz" value="<?php
	echo $stmtusernewbbttt['wybz'];
?>"></p>
<input type="submit" value="提交" class="button success">

<p><i class="fi-clock"></i>添加时间：<?php
	echo date('Y-m-d H:i:s',$stmtusernewbbttt['ctime']);
?></p>

</form>

<?php
	include 'foot.php';
	?>