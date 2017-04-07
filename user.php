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
	
	$stmtall = $dbh->prepare('SELECT id from user');
	$stmtall->execute();
	//echo $stmtall->rowCount();
	$pageCount = ceil($stmtall->rowCount()/$m);
	
	
	$stmt = $dbh->prepare('SELECT * from user order by admim desc,id desc limit :mp,:m');
	$stmt->bindValue(':mp', $mp, PDO::PARAM_INT);
	$stmt->bindValue(':m', $m, PDO::PARAM_INT);
	$stmt->execute();


	$title='会员管理';
	$mmmdddhh='user';
	include 'head.php';
	?>


<p style="margin-top: 29px;"><i class="fi-torsos-all"></i>会员管理</p>

<table style="width: 100%;">
  <thead>
    <tr>
      <th>ID</th>
      <th>用户名</th>
      <th>状态</th>
	  <th>部门</th>
	  <th>管理员</th>
	  <th>注册时间</th>
	  <th>操作</th>
	  <th>作品</th>
    </tr>
  </thead>
  <tbody><?php
	foreach ($stmt as $v) {
		if($v['satus']) $v['satus']='<span style="color:green;">正常</span>';
		else $v['satus']='禁用';
		
		/*if($v['bumen']==1) $v['bumen']='设计部';
		if($v['bumen']==2) $v['bumen']='网页部';*/
		
		if($v['admim']==1) $v['admim']='<span style="color:red;">管理员</span>';
		else $v['admim']='';
		
		
		echo '<tr><td>';
		echo $v['id'];
		echo '</td><td>'.$v['name'].'</td><td>'.$v['satus'].'</td><td>'.$bumen_arr[($v['bumen']+0)].'</td><td>'.$v['admim'].'</td><td>'.date('Y-m-d H:i:s',$v['ctime']).'</td><td><a href="/ae.php?id='.$v['id'].'">编辑</a> | '.$v['name'].'</td><td><a href="/zp.php?id='.$v['id'].'">作品</a></td></tr>';
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
   location.href = 'user.php?p='+p;
  } 
 }); 
</script>


</div>

<?php
	include 'foot.php';
	?>