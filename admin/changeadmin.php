<?php
include_once("top.php");
$sql=mysql_query("select * from admin where admin_name='".$_SESSION['sessionname']."'",$conn);
$info=mysql_fetch_array($sql);
?>
<!-- 顶部 -->
<script type="text/javascript"> 
function check(){   
        if(document.form1.username.value==""){
		alert("请输入管理帐号");
		document.form1.username.focus();
		return false;}
	if(document.form1.password.value==""){
		alert("请输入管理密码");
		document.form1.password.focus();
		return false;
	}
	if(document.form1.password2.value==""){
		alert("请输入确认密码");
		document.form1.password2.focus();
		return false;
	}
	if(document.form1.password.value!=document.form1.password2.value){
		alert("两次输入密码不一致");
		document.form1.password2.focus();
		return false;
	}
	
}
</script> 
<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>更改管理员信息</strong></div>
   <table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#BCE8B5" class="table table-bordered">
             <form name="form1" method="post" action="?act=update" onSubmit="return check(this)" enctype="multipart/form-data">
			<tr bgcolor="#FFFFFF">
              <td height="25" colspan="2" align="center" bgcolor="#ffffff"><strong>管理帐号修改</strong></td>
              </tr> <tr bgcolor="#FFFFFF">
              <td width="180" height="35" align="right"><b>管理帐号：</b> </td>
             
              <td><input type="text" name="username" class="span1-1" value="<?php echo $info['admin_name'];?>" readonly></td>
            </tr> <tr bgcolor="#FFFFFF">
              <td height="35" align="right"><b>管理密码：</b> </td>
             
              <td><input type="password" name="password" class="span1-1"></td>
            </tr> <tr bgcolor="#FFFFFF">
              <td height="35" align="right"><b>确认密码:</b> </td>
             
              <td><input type="password" name="password2" class="span1-1"></td>
            </tr>
              <tr>
        <td height="35" align="right">微信二维码：</td>
        <td height="25">
		<?php if( $info['imgwx']){?><img src="<?php echo __BASE__;?>/upimages/<?php echo $info["imgwx"];?>"  height="100" width="100"/><?php }?>
		<input type="file" name="imgwx" class="span1-1" size="30">
        <input type="hidden" name="upfilewx" class="span1-1" size="30" value="<?php echo $info['imgwx'];?>"></td>
      </tr>
      <tr>
        <td height="35" align="right">支付宝二维码：</td>
        <td height="25">
		<?php if( $info['imgzfb']){?><img src="<?php echo __BASE__;?>/upimages/<?php echo $info["imgzfb"];?>"  height="100" width="100"/><?php }?>
		<input type="file" name="imgzfb" class="span1-1" size="30">
        <input type="hidden" name="upfilezfb" class="span1-1" size="30" value="<?php echo $info['imgzfb'];?>"></td>
      </tr>
            
             <tr bgcolor="#FFFFFF">
              <td align="right"> </td>
             
              <td><input type="submit" value="确定" class="btn btn-info " style="width:80px;" onClick="return confirm('确定要修改吗？');"></td>
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
	$username = !empty($_POST['username']) ? trim($_POST['username']) : '';
	$password2 = !empty($_POST['password2']) ? md5(trim($_POST['password2'])) : '';
	
		if(!empty($_FILES['imgwx']['name'])){
			$file = $_FILES['imgwx'];//得到传输的数据
			//得到文件名称
			$name = $file['name'];
			$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
			
			//判断是否是通过HTTP POST上传的
			$upload_path = ROOT_PATH.'/upimages/'; //上传文件的存放路径
			//echo $upload_path;
			//die;
			//开始移动文件到相应的文件夹
			$mu=mt_rand(1,10000000);
			if(move_uploaded_file($file['tmp_name'],$upload_path.$mu.".".$type)){
			  $fileNamewx =$mu.".".$type;
			 
			}else{
			  //echo "Failed!";
			}
		}
		else
		{
			$fileNamewx=$_POST['upfilewx'];
		}
		
		
		if(!empty($_FILES['imgzfb']['name'])){
			$file = $_FILES['imgzfb'];//得到传输的数据
			//得到文件名称
			$name = $file['name'];
			$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
			
			//判断是否是通过HTTP POST上传的
			$upload_path = ROOT_PATH.'/upimages/'; //上传文件的存放路径
			//echo $upload_path;
			//die;
			//开始移动文件到相应的文件夹
			$mu=mt_rand(1,10000000);
			if(move_uploaded_file($file['tmp_name'],$upload_path.$mu.".".$type)){
			  $fileNamezfb =$mu.".".$type;
			 
			}else{
			  //echo "Failed!";
			}
		}
		else
		{
			$fileNamezfb=$_POST['upfilezfb'];
		}
	mysql_query("update admin set admin_pwd='$password2',imgzfb='$fileNamezfb',imgwx='$fileNamewx'",$conn);
	echo "<script>alert('修改成功！');</script>";
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