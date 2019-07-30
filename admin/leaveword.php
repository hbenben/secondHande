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
   <div class="title_right"><strong>留言管理</strong></div>
   <?php
   $sql=mysql_query("select count(*) as total from leaveword",$conn);
	   $info=mysql_fetch_array($sql);
	   $total=$info['total'];
	   if($total==0)
	   {
	   ?>
   <table width="100%" cellPadding="6" bgcolor="#E9F0E9" class="table table-bordered">
  <tr bgcolor="#E9F0E9"><td>暂时没有内容</td></tr></table>
   <?php
   }
  else
  {
			$pagesize=20;
		   if ($total<=$pagesize){
		      $pagecount=1;
			} 
			if(($total%$pagesize)!=0){
			   $pagecount=intval($total/$pagesize)+1;
			
			}else{
			   $pagecount=$total/$pagesize;
			
			}
			$page = !empty($_GET['page']) ? trim($_GET['page']) : '';
			if(($page)==""){
			    $page=1;
			
			}else{
			    $page=intval($_GET['page']);
			
			}
             $sql1=mysql_query("select * from leaveword order by id desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
             while($info1=mysql_fetch_array($sql1))
		     {
		  ?>
   <table width="750" border="0" cellpadding="0" cellspacing="0"  bgcolor="#E9F0E9" class="table table-bordered">
        <tr>
          <td height="30" bgcolor="#E9F0E9">&nbsp;&nbsp;发表人：<?php 
		     $spid=$info1['userid'];
			 $sql3=mysql_query("select name from usermember where id=".$spid."",$conn);
			 $info3=mysql_fetch_array($sql3);
			 echo $info3['name'];
			
		  ?> 发表日期：<?php echo $info1['time'];?></td>
          <td width="15%" align="center" bgcolor="#E9F0E9"><?php if($info1['isno']==1) {?><font color="#FF0000">已审核</font><?php } else{echo "未审核";}?> <a href="leavewordre.php?id=<?=$info1['id']?>">回复</a> <a href="?id=<?=$info1['id']?>&action=del" onClick="return confirm('确定要删除吗？')">删除</a></td>
        </tr>
        <tr>
          <td colspan="2"><div style="margin:10px;"><?php echo $info1['content'];?></div>
          <?php if(!empty($info1['recontent'])){?>
          <div class="line" style="height:1px;"></div><div style="margin:10px;">
          
          <span style="color:#C00">管理员回复：</span><?php echo $info1['recontent'];?> 日期：<?php echo $info1['retime'];?></div><?php }?></td>
        </tr>
      </table>
<?php
	}
?>   
<table width="550" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center">本站共&nbsp;
                  <?php
		   echo $total;
		  ?>
&nbsp;条&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;条&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
        <a href="?page=1" title="首页">首页</a> <?php if($page>=2){?><a href="?page=<?php echo $page-1;?>" title="前一页">前一页</a><?php } ?>
        <?php if($page+1<=$pagecount){?><a href="?page=<?php echo $page+1;?>" title="后一页">下一页</a><?php }?> <a href="?page=<?php echo $pagecount;?>" title="尾页">尾页</a>
          </td>
        </tr>
      </table><?php
	}
?> 
     </div>     
     </div>
    </div>
    
<!-- 底部 -->
<?php

$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'del')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	mysql_query("delete from leaveword where id='".$id."'",$conn);
	echo "<script>alert('删除成功！');location.href='leaveword.php';</script>";
}
include_once("foot.php");
?>
</body>
</html>