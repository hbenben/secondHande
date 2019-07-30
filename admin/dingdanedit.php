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
   <div class="title_right"><strong>订单管理</strong></div>
   <?php
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$sql=mysql_query("select * from dingdan where id='".$id."'",$conn);
 $info=mysql_fetch_array($sql)
	  ?>
<table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
     <form name="form1" method="post" action="saveorder.php?id=<?php echo $info['id'];?>">
	  <tr>
        <td width="70" height="35" align="right">订单编号：</td>
        <td width="271"><?php echo $info['dingdanhao'];
		?></td>
        <td width="100">已收款
          <input type="checkbox" value="已收款" name="ysk" <?php if($info['zt']=="已收款") {?>checked<?php }?>></td>
        <td width="101">已发货
          <input name="yfh" type="checkbox" value="已发货" <?php if($info['zt']=="已发货") {?>checked<?php }?>>
        </td>
        <td width="100">已收货
          <input name="ysh" type="checkbox" value="已收货" <?php if($info['zt']=="已收货") {?>checked<?php }?>>
        </td>
        <td width="101"><input type="submit" value="修改" class="buttoncss"></td>
	  </tr>
	  </form>
    </table>
    <table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
      <tr bgcolor="#cecece">
        <td height="35" align="center">商 品 名 称</td>
        <td width="106" align="center">数量</td>
        <td width="106" align="center">市场价</td>
        <td width="106" align="center">会员价</td>
        <td width="106" height="20" align="center">成交价</td>
        <td width="106" align="center">折扣</td>
        <td width="10%">小 计</td>
      </tr>
	 <?php
	   $array=explode("@",$info['spc']);
	   $arraysl=explode("@",$info['slc']);
	   $total=0;
	   for($i=0;$i<count($array)-1;$i++)
	    {
		  if($array[$i]!="")
		  {
	       $sql1=mysql_query("select * from shangpin where id='".$array[$i]."'",$conn);
		   $info1=mysql_fetch_array($sql1);
		   $total=$total+$info1['huiyuanjia']*$arraysl[$i];
	 ?>
      <tr>
        <td height="35" align="center"> &nbsp;<?php echo $info1['mingcheng'];?></td>
        <td height="25" align="center"><?php if($info1['shuliang']<0) echo "售完"; else echo $arraysl[$i];?></td>
        <td height="25" align="center"><?php echo $info1['shichangjia'];?></td>
        <td height="25" align="center"><?php echo $info1['huiyuanjia'];?></td>
        <td height="25" align="center"><?php echo $info1['huiyuanjia'];?></td>
        <td height="25" align="center"><?php echo ceil(($info1['huiyuanjia']/$info1['shichangjia'])*100);?>%</td>
        <td height="25"><?php echo $info1['huiyuanjia']*$arraysl[$i];?></td>
      </tr>
	 <?php
	     }
	   }
	 ?> 
    </table>
<table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
  <tr>
    <td height="35" align="center">合计：<?php echo $total;?>&nbsp;元&nbsp;</td>
  </tr>
</table>
<table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
      <tr bgcolor="#cecece">
        <td height="35" colspan="2" align="center">收货人信息</td>
      </tr>
      <tr>
        <td width="120" height="25" align="right">收货人姓名：</td>
        <td width="627"><?php echo $info['shouhuoren'];?></td>
      </tr>
      <tr>
        <td height="25" align="right">详细地址：</td>
        <td height="25"><?php echo $info['dizhi'];?></td>
      </tr>
      <tr>
        <td height="25" align="right">电　　话：</td>
        <td height="25"><?php echo $info['tel'];?></td>
      </tr>
      <tr>
        <td height="25" align="right">电子邮件：</td>
        <td height="25"><?php echo $info['email'];?></td>
      </tr>
      
      <?php if($info['kuaidi']){?>
      <tr>
        <td height="25" align="right">快递信息：</td>
        <td height="25"><?php echo $info['kuaidi'];?>-<?php echo $info['bianhao'];?></td>
      </tr>
      <?php }?>
      <tr>
        <td height="25" align="right">支付方式：</td>
        <td height="25"><?php echo $info['zfff'];?></td>
      </tr>
	  <tr>
        <td height="25" align="right">简单留言：</td>
        <td height="25"><?php echo $info['leaveword'];?></td>
      </tr>
    </table>
<table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
  <tr>
    <td height="20" align="center">      <input name="button" type="button" class="buttoncss" onClick="javascript:history.back();" value="返回">    </td>
  </tr>
</table>
 
     </div>     
     </div>
    </div>
    
<!-- 底部 -->
<?php
include_once("foot.php");
?>
</body>
</html>