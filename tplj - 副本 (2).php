<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
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



<?php
	include 'foot.php';
	?>
	
	
	