<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	
	$ssid=$_GET['id']+0;
	$stmt = $dbh->prepare('SELECT * from p where uid=:ssid order by id desc');
	$stmt->execute(array('ssid' => $ssid));



	
	
?>
<!DOCTYPE html>
<html>
<head>
<title><?php
	echo $_GET['name'].' 的作品';
?></title><meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<style>
.sdfsdlbbb{
	    margin-bottom: 6px;    list-style: none;
    cursor: pointer;}.sdfsdlbbb:hover{text-decoration:underline;}
</style></head>
<body><p><a href="/a.php">返回</a></p>
<?php
			$ii=1;
		echo '<ul style="width: 459px;"><li class="sdfsdlbbb"><span style="color:blue;font-weight:bolder;">'.$_GET['name'].'</span> 的作品</li>';
		$rowCount = $stmt->rowCount()+2;
		foreach ($stmt as $row) {
			echo '<li class="sdfsdlbbb" onclick="ssfs(\''.$row['url'].'\');">';
			$ii++;
			echo $rowCount-$ii;
			echo ' 时间'.date('Y-m-d H:i:s',$row['ctime']).' 投票'.$row['tp'].' 点评'.$row['dp'];
			echo '</li>';
		}
		echo '</ul>';
?>
<script>
function ssfs(uu){
	//location.href = '/u/'+uu+'.jpg';
	//window.location.href='/u/'+uu+'.jpg';
	window.open('/u/'+uu+'.jpg'); 
	return false;
}
</script>
</body>
</html>