<!DOCTYPE html>
<html>
<head>
<title><?php
	echo $title;
?>-内部竞稿系统</title>
<link rel="icon" href="/favicon.ico">
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
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
<style>
*{font-family: "Microsoft yahei", "Hiragino Sans GB", "冬青黑体简体中文 w3", "Microsoft Yahei", "Hiragino Sans GB", "冬青黑体简体中文 w3", STXihei, 华文细黑, SimSun, 宋体, Heiti, 黑体, sans-serif!important;}a:hover{text-decoration:underline;}nav a:hover{text-decoration:none;}
/*nav a:hover{    background-color: #555!important;
    background: #008cba!important;}*/
</style>

</head>

<body>

<div class="row">
  <div class="medium-12 columns">
    <div class="panel">
      <h1 style="margin-bottom: 1.625rem;"><img src="32432432.png" /></h1>
    
	
	

<nav class="top-bar" data-topbar>
  <ul class="title-area">
    <li class="name">
      <!-- 如果你不需要标题或图标可以删掉它 -->
      <h1><a style="
    cursor: default;
">内部竞稿系统（<?php echo $user_arr['name'];?>）</a></h1>
    </li>
      <!-- 小屏幕上折叠按钮: 去掉 .menu-icon 类，可以去除图标。 
      如果需要只显示图片，可以删除 "Menu" 文本 -->
    <!-- <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li> -->
  </ul>

  <section class="top-bar-section">
    <ul class="left">
      <li <?php
		if(!$mmmdddhh) echo 'class="active"';
	  ?>><a href="u.php">首页</a></li>
      <li <?php
		if($mmmdddhh=='up') echo 'class="active"';
	  ?>><a href="up.php">上传修改</a></li>
      
      <li <?php
		if($mmmdddhh=='wddp') echo 'class="active"';
	  ?>><a href="wddp.php">点评</a></li>
	  <li <?php
		if($mmmdddhh=='wdbyzt') echo 'class="active"';
	  ?>><a href="wdbyzt.php">本月主题</a></li>	
<li <?php
		if($mmmdddhh=='sybyzt') echo 'class="active"';
	  ?>><a href="sybyzt.php">所有作品</a></li>	  <li <?php
		if($mmmdddhh=='lszt') echo 'class="active"';
	  ?>><a href="lszt.php">历史主题</a></li>
	  <li <?php
		if($mmmdddhh=='xgmm') echo 'class="active"';
	  ?>><a href="xgmm.php">修改密码</a></li>
	        <li><a href="out.php">退出</a></li>
			<li><a href="/" target="_blank">前台</a></li>
    </ul>
  </section>
</nav>