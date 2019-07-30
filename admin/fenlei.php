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
   <div class="title_right"><strong>分类管理</strong></div>
   <TABLE width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
  <TBODY>
  <TR bgcolor="#ffffff">
    <TH width="90%" height="24">栏目名称</TH>
    <TH width="10%">操作</TH>
    </TR>
<?php
$sql=mysql_query("select * from fenlei order by id desc",$conn);
$info=mysql_fetch_array($sql);
 if($info==false)
  {
    echo "暂无类别!";
   }
  else
  {
		  do
		  {
?>
   <tr align="middle" bgcolor="#FFFFFF" onMouseOut="mOut(this,'#FFFFFF');" onMouseOver="mOvr(this,'#DCF9B9');" style="cursor: default;">
    <td height="25" align="left">&nbsp;<SPAN> <strong><?=$info['fenleiname']?></strong></SPAN>    </TD>
    <td align="center"><a href="fenleiedit.php?id=<?=$info['id']?>">修改</a>&nbsp;<a href="?id=<?=$info['id']?>&action=del" onClick="return confirm('确定要删除该分类吗？')">删除</a></TD>
    </TR>
<?php
	}
		 while($info=mysql_fetch_array($sql));
	}
?>     
    </TBODY></TABLE>
     </div>     
     </div>
    </div>
    
<!-- 底部 -->
<?php

$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'del')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	mysql_query("delete from fenlei where id='".$id."'",$conn);
	mysql_query("delete from shangpin where typeid='".$id."'",$conn);
	echo "<script>alert('删除成功！');location.href='fenlei.php';</script>";
}
include_once("foot.php");
?>
 <script>
!function(){
laydate.skin('molv');
laydate({elem: '#Calendar'});
}();
 
</script>
</body>
</html>