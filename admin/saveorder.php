<?php  
$ysk = !empty($_POST['ysk']) ? trim($_POST['ysk']) : '&nbsp;';
$yfh = !empty($_POST['yfh']) ? trim($_POST['yfh']) : '&nbsp;';
$ysh = !empty($_POST['ysh']) ? trim($_POST['ysh']) : '&nbsp;';
 $id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$zt="";
if($ysk!="&nbsp;"){
   $zt.=$ysk;
 }
if($yfh!="&nbsp;"){
   $zt.=$yfh;
 }
 if($ysh!="&nbsp;"){
   $zt.=$ysh;
 }
 if(($ysk=="&nbsp;")&&($yfh=="&nbsp;")&&($ysh=="&nbsp;")){
    echo "<script>alert('请选择处理状态!');history.back();</script>";
	exit;
  }
 include("../conn/conn.php");
 $sql3=mysql_query("select * from dingdan where id='".$id."'",$conn);
 $info3=mysql_fetch_array($sql3);
 if(trim($info3['zt'])=="已收款")
 {
 $sql=mysql_query("select * from dingdan where id='".$id."'",$conn);
 $info=mysql_fetch_array($sql);
 $array=explode("@",$info['spc']);
 $arraysl=explode("@",$info['slc']);
 for($i=0;$i<count($array);$i++){
	 $id=$array[$i];
     $num=$arraysl[$i];
      mysql_query("update shangpin set cishu=cishu+'".$num."' ,shuliang=shuliang-'".$num."' where id='".$id."'",$conn);
    }
  } $id = !empty($_GET['id']) ? intval($_GET['id']) : '';
 mysql_query("update dingdan set zt='".$zt."' where id=".$id,$conn);
 header("location:dingdanedit.php?id=".$id);
?>