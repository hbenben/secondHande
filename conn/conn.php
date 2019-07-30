<?php
     $conn=mysql_connect("127.0.0.1","root","root") or die("数据库服务器连接错误".mysql_error());
     mysql_select_db("xyshop",$conn) or die("数据库访问错误".mysql_error());
 	 mysql_query("set character set utf8");
     mysql_query("set names utf8");
	 $title="校园二手物品交易网站";
	 define('ROOT_PATH', str_replace('/conn/conn.php', '', str_replace('\\', '/', __FILE__)));
	 define('__BASE__', 'http://localhost/xyshop');
	 error_reporting(E_ALL^E_NOTICE^E_WARNING);
?>