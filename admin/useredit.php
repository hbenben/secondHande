<?php
include_once("top.php");
?>
<!-- 顶部 --> 
<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>会员管理</strong></div>
   <?php
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$sql=mysql_query("select * from usermember where id=".$id."",$conn);
$info=mysql_fetch_array($sql);
	  ?>
<table width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
<tr>
        <td height="35" colspan="4" align="center" bgcolor="#ffffff">会员状态修改</td>
        </tr>
      <tr>
        <td width="99" height="30" align="right">用户昵称：</td>
        <td width="180"><?php echo $info['name'];?></td>
        <td width="100" align="right">用户状态：</td>
        <td width="266"><?php
	 if($info['dongjie']==0)
	  {
	    echo "非冻结状态";
	  }
	  else
	  { 
	   echo "冻结状态"; 
	  }
		?></td>
      </tr>
      <tr>
        <td height="30" align="right">真实姓名：</td>
        <td colspan="3"><?php echo $info['truename'];?></td>
      </tr>
	  <tr>
        <td height="30" align="right">E-mail：</td>
        <td colspan="3"><?php echo $info['email'];?></td>
      </tr>
	  <tr>
        <td height="30" align="right">联系电话：</td>
        <td colspan="3"><?php echo $info['tel'];?></td>
      </tr>
	  <tr>
        <td height="30" align="right">注册时间：</td>
        <td colspan="3"><?php echo $info['regtime'];?></td>
      </tr>
      <tr>
        <td height="30" colspan="4" align="center"><a href="dongjieuser.php?id=<?php echo $id;?>">
	<?php
	 $sql=mysql_query("select * from usermember where id=".$id."",$conn);
	 $info=mysql_fetch_array($sql);
	 if($info['dongjie']==0)
	  {
	    echo "冻结该用户";
	  }
	  else
	  {
	    echo "解除冻结";
	  }
	?></a></td>
        </tr>
    </table>
 
     </div>     
     </div>
    </div>
    
<!-- 底部 -->
<?php

$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'del')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	mysql_query("delete from usermember where id='".$id."'",$conn);
	echo "<script>alert('删除成功！');location.href='usermember.php';</script>";
}
include_once("foot.php");
?>
</body>
</html>