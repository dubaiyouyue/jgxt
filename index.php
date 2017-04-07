<?php
	include 'db.php';
	
	if(!$uligon && !$_GET['v']){
		header('Location:/login.php');
		exit;
	}else if($_GET['v']){
		if(!$uligon && (($_GET['v']!=$conf['tplj']) || ($conf['ss']<$ttitme))){
			//header('Location:/login.php');
			echo '<script>alert(\'链接已经失效！\');location.href = \'/login.php\';</script>';
			exit;
		}
	}
	if(date('j',$ttitme)<$conf['my'] && $conf['qtdjs']){
		//header('Location:/login.php');
		include 'djs.php';
		exit;
	}
	
	
	$dtime=date('Y',$ttitme);
	$mtime=date('n',$ttitme);
	$stmt = $dbh->prepare('SELECT * from user where satus=:satus and (bumen=1 or bumen=2)');
	$satus=1;
	$stmt->execute(array(':satus' => $satus));

	foreach ($stmt as $row) {
		$sssdddindex[]=$row;
	}
	foreach($sssdddindex as $k=>$v){
		if($alluid) $alluid.=','.$v['id'];
		else $alluid=$v['id'];
	}
	
	$alluid_arr=explode(',',$alluid);
	//echo $alluid;
	//echo $mtime;
	$stmtlist = $dbh->prepare('SELECT * from p where dtime=:dtime and mtime=:mtime');
	
	//$stmtlist->bindParam(':alluid', $alluid);
	$stmtlist->bindParam(':dtime', $dtime);
	$stmtlist->bindParam(':mtime', $mtime);
	
	
	$stmtlist->execute();
	foreach ($stmtlist as $row) {
		$listall[]=$row;
	}
	//print_r($listall);exit;
	foreach ($listall as $k=>$v) {
		$list[$v['uid']]=$v;
	}
	
	
		$stmtfm = $dbh->prepare('SELECT * from fm where dtime=:dtime and mtime=:mtime');
	
	//$stmtlist->bindParam(':alluid', $alluid);
	$stmtfm->bindParam(':dtime', $dtime);
	$stmtfm->bindParam(':mtime', $mtime);
	
	
	$stmtfm->execute();
	foreach ($stmtfm as $row) {
		$listallfm[]=$row;
	}
	//print_r($listall);exit;
	foreach ($listallfm as $k=>$v) {
		$listfm[$v['uid']]=$v;
	}
	
	
	//print_r($listfm);exit;

	$mtime_arr=array('','一','二','三','四','五','六','七','八','九','十','十一','十二');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>公司内部竞稿平台</title>
<link href="css/styls.css?3" rel="stylesheet" type="text/css" />

<!-- css 文件 -->
<link rel="stylesheet" href="css/foundation.min.css?1">
<link rel="stylesheet" href="css/foundation-icons.css">
<!-- jQuery 库 -->
<script src="js/jquery.min.js"></script>
<script src="js/jQuery.page.js"></script>
<!-- JavaScript 文件 -->
<script src="js/foundation.min.js"></script>

<!-- modernizr.js 文件 -->
<script src="js/modernizr.js"></script>
<script src="layer/layer.js"></script>


<!--<script type="text/javascript" src="wheel.js"></script>-->

<style>
html{margin-top:-3px;}
</style><!-- 禁止选择文本： --> 
<script type="text/javascript">

var omitformtags=["input", "textarea", "select"]

omitformtags=omitformtags.join("|")

function disableselect(e){ 
if (omitformtags.indexOf(e.target.tagName.toLowerCase())==-1) 
return false 
}

function reEnable(){ 
return true 
}

if (typeof document.onselectstart!="undefined") 
document.onselectstart=new Function ("return false") 
else{ 
document.onmousedown=disableselect 
document.onmouseup=reEnable 
} 
</script><!-- 禁用右键: --> 
<script> 
function stop(){ 
return false; 
} 
document.oncontextmenu=stop; 
</script>
</head>

<body>

<!--beijing 开始-->

<div class="beijing">
  <div class="logo">
    <h1 style=" padding-top:25px;"><img src="images/logo.png" width="177" height="63" /></h1>
    <div class="wenan"></div>
  </div>
</div>
<!--beijing 结束--> 

<!--平面设计 开始-->
<div class="pingmian">
  <div class="pingmian-1 clearfix">
    <h2>平面设计</h2>
    <div class="mbx">
      <div class="mbx-1">
        <!--<div class="xing-left"></div>-->
        <div class="wenzi"><i class="fi-star" style="font-size: 18px;margin-right:10px;"></i> 时间：<?php echo $mtime_arr[$mtime];?>月份<span style=" margin-left:50px;">主题：<?php echo $stmtusernewbbttt['sjbt'];?></span> <i class="fi-star" style="font-size: 18px;margin-left:10px;"></i></div>
        <!--<div class="xing-right"></div>-->
      </div>
    </div>
    
    <!--作品1 开始-->
    <?php
		foreach($listfm as $k=>$v){
			if($v['bumen']==1 && in_array($v['uid'],$alluid_arr)){
				$sjk++;
				//echo $sjk;
				
	?>
    <div class="zuopin" <?php
		if($sjk>1) echo ' style=" margin-left:50px;"';
	?>> <a href="javascript:;" onclick="bigimg('<?php echo $list[$v['uid']]['url'];?>','<?php echo $list[$v['uid']]['zt'];?>');">
      <div class="zuopin-1">
        <div class="zuopin-2"><img src="u/<?php echo $v['url'];?>.jpg" width="354" height="249" style="width:354px;height:249px;max-width: none;" /></div>
      </div>
      </a>
      <div class="Pushbutton"> <a href="javascript:;">
        <div class="dianping" did="<?php echo $list[$v['uid']]['id'];?>" puid="<?php echo $v['uid'];?>">点评</div>
        </a> <a href="javascript:;">
        <div class="ann" onclick="ajaxposttp('<?php echo $list[$v['uid']]['id'];?>','<?php echo $v['uid'];?>','<?php echo $list[$v['uid']]['bumen'];?>');">按钮</div>
        </a> </div>
    </div>
	<?php
		if($sjk>2) $sjk=0;
		}}
	?>
    <!--作品1 结束--> 
    
    
  </div>
<!--平面设计 结束-->

<!--网页设计 开始-->

  <div class="pingmian-2 clearfix" style=" margin-top:80px;">
    <h2>网页设计</h2>
    <div class="mbx">
      <div class="mbx-1" style="width:auto;">
        <!--<div class="xing-left"></div>-->
        <div class="wenzi"><i class="fi-star" style="font-size: 18px;margin-right:10px;"></i> 时间：<?php echo $mtime_arr[$mtime];?>月份<span style=" margin-left:50px;">主题：<?php echo $stmtusernewbbttt['wybt'];?></span> <i class="fi-star" style="font-size: 18px;margin-left:10px;"></i></div>
        <!--<div class="xing-right"></div>-->
      </div>
    </div>
    
    <!--作品1 开始-->
    <?php
		foreach($listfm as $k=>$v){
			if($v['bumen']==2 && in_array($v['uid'],$alluid_arr)){
				$sjks++;
				
	?>
    <div class="zuopin" <?php
		if($sjks>1) echo ' style=" margin-left:50px;"';
	?>> <a href="javascript:;" onclick="bigimg('<?php echo $list[$v['uid']]['url'];?>','<?php echo $list[$v['uid']]['zt'];?>');">
      <div class="zuopin-1">
        <div class="zuopin-2"><img src="u/<?php echo $v['url'];?>.jpg" width="354" height="249" style="width:354px;height:249px;max-width: none;" /></div>
      </div>
      </a>
      <div class="Pushbutton"> <a href="javascript:;">
        <div class="dianping" did="<?php echo $list[$v['uid']]['id'];?>" puid="<?php echo $v['uid'];?>">点评</div>
        </a> <a href="javascript:;" onclick="ajaxposttp('<?php echo $list[$v['uid']]['id'];?>','<?php echo $v['uid'];?>','<?php echo $list[$v['uid']]['bumen'];?>');">
        <div class="ann">按钮</div>
        </a> </div>
    </div>
    <!--作品1 结束--> 
    
	<?php
		if($sjks>2) $sjks=0;
		}}
	?>
    
  
     
    
  </div>
<!--网页设计 结束-->


<!--版权所有 开始-->

<div class="foom-1"></div>
<div class="foom">


 <div class="foom-wenzi">© copyright<span style=" margin-left:10px; margin-right:10px;"><a href="http://www.resonance.com.cn/" target="_blank">广西南宁共振广告有限公司</a> </span>  版权所有</div>
</div>  
  
</div>

<div class="clearfix"></div>





<script>
function bigimg(srcs,tt){
	if(!srcs) var srcs='35574339ab3c813';
	//页面层

	layer.open({
		title:'<i class="fi-flag" style="font-size: 18px;margin-right:10px;"></i>'+tt+'<span style="font-size: 12px;margin-left:10px;color:green;"><i class="fi-lightbulb"></i>滚动鼠标放大缩小 按住左键拖动</span>',
		move: false,
	  type: 2,
	  //scrollbar: false,
	  skin: 'layui-layer-rim', //加上边框
	  area: ['100%', '100%'], //宽高
	  content: 'img.php?srcs='+srcs
	});
	//immmms()();
}



function immmms(){
	//var oImg=document.getElementsByTagName("img")[0];
	var oImg=document.getElementById('imgjjjjs');
	fnWheel(oImg,function (down,oEvent){

		var oldWidth=this.offsetWidth;
		var oldHeight=this.offsetHeight;
		var oldLeft=this.offsetLeft;
		var oldTop=this.offsetTop;

		var scaleX=(oEvent.clientX-oldLeft)/oldWidth;//比例
		var scaleY=(oEvent.clientY-oldTop)/oldHeight;

		if (down){
			this.style.width=this.offsetWidth*0.9+"px";
			this.style.height=this.offsetHeight*0.9+"px";
		}
		else{
			this.style.width=this.offsetWidth*1.1+"px";
			this.style.height=this.offsetHeight*1.1+"px";
		}

		var newWidth=this.offsetWidth;
		var newHeight=this.offsetHeight;

		this.style.left=oldLeft-scaleX*(newWidth-oldWidth)+"px";
		this.style.top=oldTop-scaleY*(newHeight-oldHeight)+"px";
	});
}	










$(document).ready(function(){
  $('.dianping').click(function(){
  
	//页面层
	var did=$(this).attr('did');
	var puid=$(this).attr('puid');
	

  
  
	<?php
		if(!$conf['dp']){
	?>
	layer.alert('点评功能暂未开放',{title:'提示'}); 
	return false;
	<?php
		}
	?>
  
	//ajaxpost(did);
	ajaxpost(did,puid);

	
	layer.open({
		title:'<i class="fi-pencil" style="font-size: 18px;margin-right:10px;"></i>点评',
		move: false,
	  type: 1,
	  //scrollbar: false,
	  skin: 'layui-layer-rim', //加上边框
	  area: ['680px', '480px'], //宽高
	  content: '<form style="width: 79%;margin: auto;margin-top: 20px;" action="adddp.php" method="POST" enctype="multipart/form-data" id="upprrsss" name="upprrsss" ><p><textarea placeholder="请填写点评作品内容" id="dianping'+did+'" name="dianping" style="height: 109px;"></textarea></p><p><input type="button" value="提交" class="button success tiny" onclick="dasfas(\''+did+'\',\''+puid+'\');" id="submitdsfsd"></p><p class="pb10" style="color:red;display:none;" id="zesscc">正在提交...</p><p><i class="fi-comment"></i>点评内容</p><div id="dianppps'+did+'">正在获取点评内容...</div></form>'
	});
  });
});
function dasfas(did,puid){
	var file=$('#dianping'+did).val();
	if(file){
		$('#submitdsfsd').hide();
		$('#zesscc').show();
		//document.getElementById("upprrsss").submit();
		
		
		$.ajax( {
			url:"addp.php?v=<?php echo $_GET['v'];?>", 
			type: "post", 
			data:"content="+file+"&pid="+did+'&puid='+puid,
			//dataType: "json",
			//cache: false,
			//async: false,
			beforeSend: function(){
			 // Handle the beforeSend event
			},
			success: function(data){
				//alert(data);
				if(data!='ok'){
					layer.alert('提交失败，服务器繁忙。',{title:'提示'}); 
				}else{
					$('#dianping'+did).val('');
					//layer.alert('点评提交成功，需管理员审核。',{title:'提示'}); 
					$('#zesscc').html('<span style="color:green">点评提交成功，需管理员审核。</span>');
				}
			}
		});
		
	}else{
		layer.alert('请填写点评内容',{title:'提示'});    
	}
}

function ajaxpost(pid,puid){
	//alert(pid);
    $.ajax( {
        url:"hqdp.php?v=<?php echo $_GET['v'];?>", 
        type: "post", 
        data:"puid="+puid,
        //dataType: "json",
        //cache: false,
        //async: false,
        beforeSend: function(){
         // Handle the beforeSend event
        },
        success: function(data){
            if(!data){
				$('#dianppps'+pid).text('暂无点评内容哦');
			}else{
				$('#dianppps'+pid).html(data);
			}
        }
    });
}
function ajaxposttp(pid,puid,bumen){

	<?php
		if(!$conf['tp']){
	?>
	layer.alert('投票功能暂未开放哦',{title:'提示'}); 
	return false;
	<?php
		}
	?>

    $.ajax( {
        url:"adtp.php?v=<?php echo $_GET['v'];?>", 
        type: "post", 
        data:"pid="+pid+'&puid='+puid+'&bumen='+bumen,
        //dataType: "json",
        //cache: false,
        //async: false,
        beforeSend: function(){
         // Handle the beforeSend event
        },
        success: function(data){
            if(data=='ok'){
				layer.alert('投票成功！',{title:'提示'}); 
			}else if(data=='yktpone'){
				layer.alert('你已经投票，不能再投票了。',{title:'提示'}); 
			}else{
				layer.alert('投票失败，服务器繁忙。',{title:'提示'}); 
			}
        }
    });
}
</script>









</body>
</html>
