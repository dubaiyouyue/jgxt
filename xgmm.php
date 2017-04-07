<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
		$title='修改密码';
	$mmmdddhh='xgmm';
	include 'headu.php';
?>
<p style="margin-top: 29px;"><i class="fi-eye"></i>修改密码</p>
<form action="xgmmp.php" id="upprrsss" name="upprrsss" method="POST">
旧密码：
<input type="text" name="oldpass" id="oldpass" />
新密码：
<input type="text" name="newpass" id="newpass" />
<input type="button" value="提交修改" class="button" onclick="dasfas();" />
</form>
<script>
function dasfas(){
	var newpass=$('#newpass').val();
	var oldpass=$('#oldpass').val();
	if(!oldpass){
		layer.alert('请填写旧密码',{title:'提示'});   
		return false;
	}	if(!newpass){
		layer.alert('请填写新密码',{title:'提示'});   
		return false;
	}


		document.getElementById("upprrsss").submit();

}
</script>
<?php
	include 'foot.php';
	?>