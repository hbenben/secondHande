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
   $sql1=mysql_query("select count(*) as total from dingdan",$conn);
	   $info1=mysql_fetch_array($sql1);
	   $total=$info1['total'];
	   if($total==0)
	   {
	   ?>
   <table width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
  <tr bgcolor="#ffffff"><td>暂时没有内容</td></tr></table>
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
             $sql1=mysql_query("select * from dingdan order by id desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
             $info1=mysql_fetch_array($sql1);
	  
	  ?>
   <table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
     <tr>
        <td height="35" colspan="9" align="center" bgcolor="#cecece">订单中心</td>
        </tr>
	  <tr>
        <td width="121" height="35" align="center">订单号</td>
        <td width="59" align="center">下单人</td>
        <td width="60" align="center">订货人</td>
        <td width="70" align="center">金额总计</td>
        <td width="88" align="center">付款方式</td>
        <td width="69" align="center">订单状态</td>
        <td width="70" align="center">发货</td>
        <td width="115" align="center">操作</td>
      
	  </tr>
	  <?php
	  
		    do{
			  $array=explode("@",$info1['spc']);
		      $sum=count($array)*20+260;
	  ?>
      <tr>
        <td height="35" align="center"><?php echo $info1['dingdanhao'];?></td>
        <td height="21" align="center"><?php echo $info1['xiadanren'];?></td>
        <td height="21" align="center"><?php echo $info1['shouhuoren'];?></td>
        <td height="21" align="center"><?php echo $info1['total'];?></td>
        <td height="21" align="center"><?php echo $info1['zfff'];?></td>
        <td height="21" align="center"><?php echo $info1['zt'];?></td>
        <td height="21" align="center"><?php if($info1['zt']=="已收款"){?><a href="fahuo.php?id=<?php echo $info1['id'];?>"><input type="button" value="发货" /></a><?php }?></td>
        <td height="21" align="center">
          <a href="dingdanedit.php?id=<?=$info1['id']?>">查看状态</a>
          &nbsp;
          <a href="?id=<?=$info1['id']?>&action=del" onClick="return confirm('确定要删除吗？')">删除</a></td>
      </tr>
	  <?php
	      }while($info1=mysql_fetch_array($sql1))
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
	mysql_query("delete from dingdan where id='".$id."'",$conn);
	echo "<script>alert('删除成功！');location.href='dingdan.php';</script>";
}
if($action == 'tuihuo')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	$spc = !empty($_GET['spc']) ? trim($_GET['spc']) : '';
	$slc = !empty($_GET['slc']) ? trim($_GET['slc']) : '';
	mysql_query("update dingdan set th=1 where id='".$id."'",$conn);
	 $array=explode("@",$spc);
 $arraysl=explode("@",$slc);
 for($i=0;$i<count($array);$i++){
	 $id=$array[$i];
     $num=$arraysl[$i];
      mysql_query("update shangpin set cishu=cishu-'".$num."' ,shuliang=shuliang+'".$num."' where id='".$id."'",$conn);
    }
	echo "<script>alert('退货成功！');location.href='dingdan.php';</script>";
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