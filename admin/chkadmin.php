<?php
session_start();
 class chkinput{
   var $admin_name;
   var $admin_pwd;

   function chkinput($x,$y)
    {
     $this->admin_name=$x;
     $this->admin_pwd=$y;
    }

   function checkinput()
   {
     include("../conn/conn.php");
     $sql=mysql_query("select * from admin where admin_name='".$this->admin_name."'",$conn);
     $info=mysql_fetch_array($sql);
     if($info==false)
       {
          echo "<script language='javascript'>alert('不存在此管理员！');history.back();</script>";
          exit;
       }
      else
       {
          if($info['admin_pwd']==$this->admin_pwd){
			  $_SESSION['sessionname'] = $info['admin_name'];
				$_SESSION['sessionid'] = $info['id'];
               header("location:default.php");
            }
          else
           {
             echo "<script language='javascript'>alert('密码输入错误！');history.back();</script>";
             exit;
           }

      }    
   }
 }


    $obj=new chkinput(trim($_POST['name']),md5(trim($_POST['pwd'])));
    $obj->checkinput();

?>