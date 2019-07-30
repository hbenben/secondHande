<?php
include("conn/conn.php");
while(list($name,$value)=each($_POST))
  {
    mysql_query("delete from usermember where id=".$value."",$conn); 
	mysql_query("delete from pinglun where userid=".$value."");
	mysql_query("delete from leaveword where userid=".$value."",$conn);
  }
header("location:edituser.php");
?>