<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	
	$stmt = $dbh->prepare('SELECT * from conf');
	$stmt->execute();

	$sssddd=array();
	foreach ($stmt as $row) {
		$sssddd[]=$row;
	}
	
	$sssddd=$sssddd['0'];
	
	$title='系统设置';
	$mmmdddhh='aset';
	include 'head.php';
	?>

	<p style="margin-top: 29px;"><i class="fi-widget"></i>系统设置</p>
	
<form name="input" action="asetp.php" method="POST">
<p><i class="fi-shield"></i>注册:<input type="radio" <?php
	if($sssddd['re']==0) echo 'checked="checked"';
?> name="re" value="0" />关闭 <input type="radio" <?php
	if($sssddd['re']==1) echo 'checked="checked"';
?> name="re" value="1" />开启</p>
<p><i class="fi-foot"></i>水印:<input type="text" name="sy" value="<?php
	echo $sssddd['sy'];?>"></p>
	<p><i class="fi-foot"></i>颜色:<input type="text" name="syys" value="<?php
	echo $sssddd['syys'];?>"></p>
<p><i class="fi-foot"></i>宽度(当水印横向显示不全时，请增加宽度):<input type="text" name="sykd" value="<?php
	echo $sssddd['sykd'];?>"></p>
	
<p><i class="fi-foot"></i>高度:<input type="text" name="sygd" value="<?php
	echo $sssddd['sygd'];?>"></p>
	
<p><i class="fi-foot"></i>左边:<input type="text" name="syzb" value="<?php
	echo $sssddd['syzb'];?>"></p>
	
<p><i class="fi-foot"></i>顶部:<input type="text" name="syyb" value="<?php
	echo $sssddd['syyb'];?>"></p>
	
<p><i class="fi-foot"></i>印高(单行水印顶部偏移量,参考文字水印字体大小修改):<input type="text" name="syybyingg" value="<?php
	echo $sssddd['syybyingg'];?>"></p>
	
	<p><i class="fi-foot"></i>文字水印字体大小:<input type="text" name="syyssiez" value="<?php
	echo $sssddd['syyssiez'];?>"></p>
	
<p><i class="fi-foot"></i>图片水印:<input type="text" name="imagethumb" value="<?php
	echo $sssddd['imagethumb'];?>"></p>
	
	
<p><i class="fi-foot"></i>旋转值:<input type="text" name="syxz" value="<?php
	echo $sssddd['syxz'];?>"></p>
	
	
<p><i class="fi-foot"></i>单行水印:<input type="radio" <?php
	if($sssddd['syxzssdhsy']==0) echo 'checked="checked"';
?> name="syxzssdhsy" value="0" />关闭 <input type="radio" <?php
	if($sssddd['syxzssdhsy']==1) echo 'checked="checked"';
?> name="syxzssdhsy" value="1" />开启</p>
	
	
	
<p><i class="fi-foot"></i>旋转:<input type="radio" <?php
	if($sssddd['syxzss']==0) echo 'checked="checked"';
?> name="syxzss" value="0" />设置的值 <input type="radio" <?php
	if($sssddd['syxzss']==1) echo 'checked="checked"';
?> name="syxzss" value="1" />随机</p>
<p><i class="fi-foot"></i>方式:<input type="radio" <?php
	if($sssddd['syxzssf']==1) echo 'checked="checked"';
?> name="syxzssf" value="1" />文字水印 <input type="radio" <?php
	if($sssddd['syxzssf']==2) echo 'checked="checked"';
?> name="syxzssf" value="2" />图片水印 <input type="radio" <?php
	if($sssddd['syxzssf']==0) echo 'checked="checked"';
?> name="syxzssf" value="0" />关闭</p>
	
<p><i class="fi-clipboard-pencil"></i>每月:<input type="text" name="my" value="<?php
	echo $sssddd['my'];?>" style="margin-bottom: 0px;">号之后禁止修改</p>
<p><i class="fi-lock"></i>前台倒计时:<input type="radio" <?php
	if($sssddd['qtdjs']==0) echo 'checked="checked"';
?> name="qtdjs" value="0" />关闭 <input type="radio" <?php
	if($sssddd['qtdjs']==1) echo 'checked="checked"';
?> name="qtdjs" value="1" />开启</p>

	
<p><i class="fi-ticket"></i>投票:<input type="radio" <?php
	if($sssddd['tp']==0) echo 'checked="checked"';
?> name="tp" value="0" />关闭 <input type="radio" <?php
	if($sssddd['tp']==1) echo 'checked="checked"';
?> name="tp" value="1" />开启</p>
<p><i class="fi-lightbulb"></i>点评:<input type="radio" <?php
	if($sssddd['dp']==0) echo 'checked="checked"';
?> name="dp" value="0" />关闭 <input type="radio" <?php
	if($sssddd['dp']==1) echo 'checked="checked"';
?> name="dp" value="1" />开启</p>
	
<p><i class="fi-paw"></i>游客:<input type="radio" <?php
	if($sssddd['yktp']==0) echo 'checked="checked"';
?> name="yktp" value="0" />(只能投1个作品1次) <input type="radio" <?php
	if($sssddd['yktp']==1) echo 'checked="checked"';
?> name="yktp" value="1" />(能投全部作品1次) 投票</p>
	
<p><i class="fi-at-sign"></i>内部:<input type="radio" <?php
	if($sssddd['nbtp']==0) echo 'checked="checked"';
?> name="nbtp" value="0" />(只能投1个作品1次) <input type="radio" <?php
	if($sssddd['nbtp']==1) echo 'checked="checked"';
?> name="nbtp" value="1" />(能投全部作品1次) 投票</p>
	
<p><input type="submit" value="提交" class="button success"></p>


</form>

<?php
	include 'foot.php';
	?>