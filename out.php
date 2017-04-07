<?php
				setcookie("loginslat", '', time()-36000000);
			setcookie("id", '', time()-36000000);
header('Location:/');//跳转到带www的网址
 //header后的PHP代码还会被执行 .确保重定向后，后续代码不会被执行 
exit;