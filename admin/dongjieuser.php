<?php
include("../conn/conn.php");
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$sql=mysql_query("select * from usermember where id=".$id."",$conn);
$info=mysql_fetch_array($sql);
if($info['dongjie']==0)
   {
     mysql_query("update usermember set dongjie=1 where id='".$id."'",$conn);
   }
 else
  {
     mysql_query("update usermember set dongjie=0 where id='".$id."'",$conn); 
  }
 header("location:useredit.php?id=".$id."");   
?>