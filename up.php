<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	
	$title='上传/修改';
	$mmmdddhh='up';
	include 'headu.php';
?>

<p style="margin-top: 29px;"><i class="fi-upload"></i>上传修改作品</p>

<form action="file.php" class="ffurr" method="POST" id="upprrsss" name="upprrsss" enctype="multipart/form-data"><p class="pb10">
<label for="file" style="font-size: 14px;"><i class="fi-photo"></i>请选择上传作品图片:</label>
<input type="file" name="file" id="file" /> </p>
<p class="pb10">
<label for="file" style="font-size: 14px;"><i class="fi-paperclip"></i>作品备注说明:</label>
<input type="text" name="sm" value="" /> </p>

<p class="pb10" style="color:red;display:none;" id="zesscc">正在上传...</p>
<p class="pb10" style="<?php
	if(date('j',$ttitme)>($conf['my']-1)) echo 'display:none;';
?>">
<input type="button" id="submitdsfsd" value="上传" class="inss button" onclick="dasfas();" /></p>
<p class="pb10" style="font-size: 12px;color: #999;"><i class="fi-info" style="font-size: 14px;color: #000;"></i>图片上传进度请看浏览器左下角,<span style="<?php
	if(date('j',$ttitme)>($conf['my']-1)) echo 'color:red;';
?>">每月作品<?php
	echo $conf['my'];
?>号之后禁止修改</span></p>
</form>

<script>
function dasfas(){
	var file=$('#file').val();
	if(file){
		$('#submitdsfsd').hide();
		$('#zesscc').show();
		document.getElementById("upprrsss").submit();
	}else{
		layer.alert('请选择要上传的作品图片',{title:'提示'});    
	}
}
</script>

<?php
	include 'foot.php';
	?>