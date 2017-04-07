<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
session_start();	
define('ZH', 'true');
	function code_keys($length,$pattern){
	 for($i=0;$i<$length;$i++){
	    $key .= substr($pattern,mt_rand(1,9),1);
	 }
	 return $key;
	} 
		include_once(__DIR__.'/zh.php');
	$str=code_keys(5,$pattern);
	$_SESSION['check_pic']=$str;
		include_once(__DIR__.'/33.php');
?>