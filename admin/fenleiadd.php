<?php
include_once("top.php");
?>
<!-- 顶部 -->
<script type="text/javascript"> 
function check(){   
        if(document.form1.fenleiname.value==""){
		alert("请输入分类名称");
		document.form1.fenleiname.focus();
		return false;}
}
</script> 
<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>添加类别</strong></div>
   <table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#BCE8B5" class="table table-bordered">
             <form name="form1" method="post" action="?act=update" onSubmit="return check(this)">
			<tr bgcolor="#FFFFFF">
              <td height="25" colspan="2" align="center" bgcolor="#ffffff"><strong>
                
              添加分类名称</strong></td>
              </tr> <tr bgcolor="#FFFFFF">
              <td width="180" height="35" align="right"><b>分类名称：</b> </td>
             
              <td><input type="text" name="fenleiname" class="span1-1"/></td>
            </tr> <tr bgcolor="#FFFFFF">
              <td align="right"> </td>
             
              <td><input type="submit" value="确定" class="btn btn-info " style="width:80px;"></td>
            </tr></form>
          </table>
     </div>     
     </div>
    </div>
    
<!-- 底部 -->
<?php
$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
if($act == 'update')
{
	$fenleiname = !empty($_POST['fenleiname']) ? trim($_POST['fenleiname']) : '';
	mysql_query("insert into fenlei(fenleiname) values('$fenleiname')",$conn);
	echo "<script>alert('添加成功！');location.href='fenlei.php';</script>";
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