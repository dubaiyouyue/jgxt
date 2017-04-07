<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
require_once("../../API/qqConnectAPI.php");
$qc = new QC();
$qc->qq_login();
	$_SESSION['login_app']=0;
	$_SESSION['login_app_token']=0;
$_SESSION['sinatokenuid']=0;
$_SESSION['qquid']='';
//20170106
$login_app=$_GET['loginapp'];
$login_app_token=$_GET['loginapptoken'];
if(($login_app=='m' || $login_app=='weixin') && $login_app_token){
	$_SESSION['login_app']=$login_app;
	$_SESSION['login_app_token']=$login_app_token;
}