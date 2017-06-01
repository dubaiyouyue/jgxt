<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
session_start();
header("Content-Type: text/html; charset=utf-8");

// store session data



$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名 127.0.0.1
$dbName='root';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='root';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";
$dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
$dbh->query("SET NAMES utf8");  // $_pdo->exec('SET NAMES utf8');  //设置数据库编码，两种方法都可以
foreach ($dbh->query('SELECT * from conf') as $row) {
	$conf[]=$row;
}
  $conf=$conf['0'];
//print_r($conf);

/*try {
    $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
    echo "连接成功<br/>";*/
    /*你还可以进行一次搜索操作
    foreach ($dbh->query('SELECT * from FOO') as $row) {
        print_r($row); //你可以用 echo($GLOBAL); 来看到这些值
    }
    */
   /* $dbh = null;
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}*/
//默认这个不是长连接，如果需要数据库长连接，需要最后加一个参数：array(PDO::ATTR_PERSISTENT => true) 变成这样：
//$db = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));

$ttitme=time();
$uligon=0;
if($_COOKIE['id'] && $_COOKIE['loginslat']){
	$loginslat=$_COOKIE['loginslat'];
	$ssid=$_COOKIE['id'];
	$stmt = $dbh->prepare('SELECT * from user where loginslat=:loginslat and id=:ssid limit 1');
	$stmt->execute(array(':loginslat' => $loginslat,':ssid' => $ssid));

	foreach ($stmt as $row) {
		$sssddd[]=$row;
	}
	if($sssddd['0']['id']) $uligon=$sssddd['0']['id'];
	if(!$sssddd['0']['satus']) $uligon=0;
	$user_arr=$sssddd['0'];
}
		//本月最新主题
		$dtime=date('Y',$ttitme);
		$mtime=date('n',$ttitme);
	$stmt = $dbh->prepare('SELECT * from zt where dtime=:dtime and mtime=:mtime order by id desc limit 1');
	$stmt->execute(array(':dtime' => $dtime,':mtime'=>$mtime));
	foreach ($stmt as $vuser) {
		$stmtusernewbbttt[]=$vuser;
	}
	$stmtusernewbbttt=$stmtusernewbbttt['0'];
	
		$stmtusernewbbttt['sjbt']=$stmtusernewbbttt['bt'];
		$stmtusernewbbttt['sjbz']=$stmtusernewbbttt['bz'];
	
	if($user_arr['bumen']==2){
		$stmtusernewbbttt['bt']=$stmtusernewbbttt['wybt'];
		$stmtusernewbbttt['bz']=$stmtusernewbbttt['wybz'];
	}/*else if($user_arr['bumen']==1){
		$stmtusernewbbttt['bt']=$stmtusernewbbttt['bt'];
		$stmtusernewbbttt['bz']=$stmtusernewbbttt['bz'];
	}*/
	




function getIP() { 
    if (getenv('HTTP_CLIENT_IP')) { 
    $ip = getenv('HTTP_CLIENT_IP'); 
    } 
    elseif (getenv('HTTP_X_FORWARDED_FOR')) { 
    $ip = getenv('HTTP_X_FORWARDED_FOR'); 
    } 
    elseif (getenv('HTTP_X_FORWARDED')) { 
    $ip = getenv('HTTP_X_FORWARDED'); 
    } 
    elseif (getenv('HTTP_FORWARDED_FOR')) { 
    $ip = getenv('HTTP_FORWARDED_FOR'); 

    } 
    elseif (getenv('HTTP_FORWARDED')) { 
    $ip = getenv('HTTP_FORWARDED'); 
    } 
    else { 
    $ip = $_SERVER['REMOTE_ADDR']; 
    } 
    return $ip; 
} 
function dump($vars, $label = '', $return = false) {
    if (ini_get('html_errors')) {
        $content = "
\n";
        if ($label != '') {
            $content .= "<strong>{$label} :</strong>\n";
        }
        $content .= htmlspecialchars(print_r($vars, true));
        $content .= "\n
\n";
    } else {
        $content = $label . " :\n" . print_r($vars, true);
    }
    if ($return) { return $content; }
    echo '<pre>'.$content.'</pre>';
    return null;
}






$bumen_arr=array('请选择部门','设计部','网页部','商务部','总经办','技术部','策划部');




