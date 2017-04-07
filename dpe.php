<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	
	$id=$_GET['id']+0;
	$stmt = $dbh->prepare('SELECT * from dp where id=:id order by id desc limit 1');
	$stmt->execute(array('id' => $id));
	
	
	foreach ($stmt as $vuser) {
		$stmtdp[]=$vuser;
	}
	$stmtdp=$stmtdp['0'];
	
	//print_r($stmtusernew);exit;
	$title='点评审核';
	$mmmdddhh='dp';
	include 'head.php';
?>
<p style="margin-top: 29px;"><i class="fi-plus"></i>点评编辑</p>

<form action="dpep.php" method="POST">
<input type="hidden" name="id" value="<?php
	echo $stmtdp['id'];
?>"><input type="hidden" name="pid" value="<?php
	echo $stmtdp['pid'];
?>">
<p><i class="fi-clipboard-pencil"></i>内容：<input type="text" name="content" value="<?php
	echo $stmtdp['content'];
?>"></p>



<p><i class="fi-unlock"></i>审核: <input type="radio" <?php
	if($stmtdp['satus']==0) echo 'checked="checked"';
?> name="satus" value="0" />禁止 <input type="radio" name="satus" <?php
	if($stmtdp['satus']==1) echo 'checked="checked"';
?>  value="1" />通过</p>










<input type="submit" value="提交" class="button success">
</form>

<?php
	include 'foot.php';
	?>