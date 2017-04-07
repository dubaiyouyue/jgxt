<?php
	include 'db.php';
	if(!$uligon){
		header('Location:/login.php');
		exit;
	}
	if($user_arr['admim']!=1) exit('没有权限！');
	
	$m=19;
	$p=$_GET['p']+0;
	if($p<1) $p=1;
	$mp=($p-1)*$m;
	
	$stmtall = $dbh->prepare('SELECT id from dp');
	$stmtall->execute();
	$pageCount = ceil($stmtall->rowCount()/$m);
	
	$stmt = $dbh->prepare('SELECT * from dp order by id desc limit :mp,:m');
	$stmt->bindValue(':mp', $mp, PDO::PARAM_INT);
	$stmt->bindValue(':m', $m, PDO::PARAM_INT);
	$stmt->execute();
	

	
	//print_r($stmtusernew);exit;
	$title='点评审核';
	$mmmdddhh='dp';
	include 'head.php';
?>
<p style="margin-top: 29px;"><i class="fi-comments"></i>审核点评</p>

<table style="width: 100%;">
  <thead>
    <tr>
		<th>ID</th>
      <th>PID</th>
      <th>IP</th>
      <th>内容</th>
	  <th style="width: 166px;">时间</th>
	  <th style="width: 61px;">状态</th>
	  <th style="width: 61px;">操作</th>
    </tr>
  </thead>
  <tbody><?php
	foreach ($stmt as $v) {
		if($v['satus']) $v['satus']='<span style="color:green;">通过</span>';
		else $v['satus']='禁止';
		

		

		
		
		echo '<tr><td>'.$v['id'].'</td><td>'.$v['pid'].'</td><td>'.long2ip($v['ip']).'</td><td>'.$v['content'].'</td><td>'.date('Y-m-d H:i:s',$v['ctime']).'</td><td>'.$v['satus'].'</td><td><a href="/dpe.php?id='.$v['id'].'">编辑</a></td></tr>';
	}
  ?>
    
     
    
    
  </tbody>
</table>
<div class="tcdPageCode"></div>
<style>
.tcdPageCode{padding: 15px 20px;text-align: left;color: #ccc;} 
.tcdPageCode a{display: inline-block;color: #428bca;display: inline-block;height: 25px; line-height: 25px; padding: 0 10px;border: 1px solid #ddd; margin: 0 2px;border-radius: 4px;vertical-align: middle;} 
.tcdPageCode a:hover{text-decoration: none;border: 1px solid #428bca;} 
.tcdPageCode span.current{display: inline-block;height: 25px;line-height: 25px;padding: 0 10px;margin: 0 2px;color: #fff;background-color: #428bca; border: 1px solid #428bca;border-radius: 4px;vertical-align: middle;} 
.tcdPageCode span.disabled{ display: inline-block;height: 25px;line-height: 25px;padding: 0 10px;margin: 0 2px; color: #bfbfbf;background: #f2f2f2;border: 1px solid #bfbfbf;border-radius: 4px;vertical-align: middle;} 
</style> 
<script>
$(".tcdPageCode").createPage({ 
  pageCount:<?php
	echo $pageCount;
  ?>, 
  current:<?php
	echo $p;
  ?>, 
  backFn:function(p){ 
   //单击回调方法，p是当前页码 
   location.href = 'dp.php?p='+p;
  } 
 }); 
</script>


<?php
	include 'foot.php';
	?>