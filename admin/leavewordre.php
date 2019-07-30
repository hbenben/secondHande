<?php
include_once("top.php");
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$sql=mysql_query("select * from leaveword where id=".$id."",$conn);
$info=mysql_fetch_array($sql);
?>
<script type="text/javascript"> 
function check(){   
        if(document.form1.title.value==""){
		alert("请输入名称");
		document.form1.title.focus();
		return false;}
}
</script> 
<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>回复审核留言</strong></div>
   <table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#BCE8B5" class="table table-bordered">
             <form name="form1" method="post" action="?action=update&id=<?php echo $info['id'];?>" onSubmit="return check(this)">
			<tr bgcolor="#FFFFFF">
              <td height="25" colspan="2" align="center" bgcolor="#E9F0E9"><strong>
                
              回复审核留言</strong></td>
              </tr> <tr bgcolor="#FFFFFF">
              <td width="180" height="35" align="right"><b>留言内容：</b> </td>
             
              <td><div style="margin:10px;"><?php echo $info['content'];?></div></td>
            </tr> 
             <tr bgcolor="#FFFFFF">
              <td width="180" height="35" align="right"><b>回复留言：</b> </td>
             
              <td>
              <textarea name="recontent" style="width:500px;height:200px; margin:10px;"><?php echo $info['recontent'];?></textarea>  
     </td>
            </tr>
            <tr bgcolor="#FFFFFF">
              <td width="180" height="35" align="right"><b>是否审核：</b> </td>
             
              <td><input name="isno" type="checkbox" value="1"  <?php if($info['isno']==1) {?>checked<?php }?>/></td>
            </tr> 
            <tr bgcolor="#FFFFFF">
              <td align="right"> </td>
             
              <td><input type="submit" value="确定" class="btn btn-info " style="width:80px;"></td>
            </tr></form>
          </table>
     </div>     
     </div>
    </div>
    
<!-- 底部 -->
<?php
$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'update')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	$recontent = !empty($_POST['recontent']) ? trim($_POST['recontent']) : '';
	$isno = !empty($_POST['isno']) ? intval($_POST['isno']) : '0';
	$retime=date("Y-m-j");
	mysql_query("update leaveword set recontent='$recontent',isno='$isno',retime='$retime' where id=".$id,$conn);
	echo "<script>alert('修改成功！');location.href='leaveword.php';</script>";
}
include_once("foot.php");
?>
</body>
</html>