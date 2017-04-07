<?php
require_once("../../API/qqConnectAPI.php");
$qc = new QC();  
$acs = $qc->qq_callback();  
$oid = $qc->get_openid();  
$qc = new QC($acs,$oid);  
$uinfo = $qc->get_user_info();  
//print_r($uinfo);
$_SESSION['qquid']=$oid;
//if(!$uinfo['nickname']) $uinfo['nickname']='0';
$_SESSION['qqname']=$uinfo['nickname'];
$_SESSION['qqtx']=$uinfo['figureurl_qq_1'];
if($_SESSION['qquid']){
	$_SESSION['sinatokenuid']=0;
	//echo $_SESSION['qquid'];
	
	//shouji
	/*if(($_SESSION['login_app']=='m' || $_SESSION['login_app']=='weixin') && $_SESSION['login_app_token']){
		header('Location:/index.php/Home/CheckForLoginapp/index.html');
		exit;
	}*/
	
	
	header('Location:/checkforlogin.php');
	exit;
}
/*
require_once("../../API/qqConnectAPI.php");
$qc = new QC();
//echo $qc->qq_callback();
$openid=$qc->get_openid();
//print_r($_SESSION);
//connect.qq OpenID_OAuth
if($openid){
	$ch = curl_init();
	$timeout = 5;
	echo $url='https://graph.qq.com/user/get_user_info?access_token='.$_SESSION['access_token'].'&oauth_consumer_key=101377750&openid='.$openid;
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$file_contents = curl_exec($ch);
	curl_close($ch);
	echo 'fadsfads';
	echo $file_contents;
}*/