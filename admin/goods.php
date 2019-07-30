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
   <div class="title_right"><strong>商品管理</strong></div>
   <?php
   $sql=mysql_query("select count(*) as total from shangpin",$conn);
	   $info=mysql_fetch_array($sql);
	   $total=$info['total'];
	   if($total==0)
	   {
	   ?>
   <table width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
  <tr bgcolor="#ffffff"><td>暂时没有内容</td></tr></table>
   <?php
   }
  else
  {
	  ?>
   <table width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
  <tr bgcolor="#ffffff">
    <th height="24">车辆名称</th>
    <th width="12%">图片</th>
    <th width="8%">市场价</th>
    <th width="8%">会员价</th>
    <th width="5%">数量</th>
    <th width="8%">时间</th>
    <th width="5%">操作</th>
    </tr>
<?php
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
             $sql1=mysql_query("select * from shangpin order by id desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
             while($info1=mysql_fetch_array($sql1))
		     {
		  ?>
   <tr align="middle" bgcolor="#FFFFFF" onMouseOut="mOut(this,'#FFFFFF');" onMouseOver="mOvr(this,'#DCF9B9');" style="cursor: default;">
    <td height="25" align="left">&nbsp;<SPAN> <strong><?=$info1['mingcheng']?></strong></SPAN>    </TD>
    <td height="25" align="center"><img src="<?php echo __BASE__;?>/upimages/<?php echo $info1["tupian"];?>" height="150" width="150" /></TD>
    <td height="25" align="center"><?=$info1['shichangjia']?></TD>
    <td height="25" align="center"><?=$info1['huiyuanjia']?></TD>
    <td height="25" align="center"><?=$info1['shuliang']?></TD>
    <td height="25" align="center"><?=$info1['addtime']?></TD>
    <td align="center"><a href="goodedit.php?id=<?=$info1['id']?>">修改</a>&nbsp;<a href="?id=<?=$info1['id']?>&action=del" onClick="return confirm('确定要删除吗？')">删除</a></TD>
    </tr>
<?php
	}
?>     
    </table><?php
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
	mysql_query("delete from shangpin where id='".$id."'",$conn);
	echo "<script>alert('删除成功！');location.href='goods.php';</script>";
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