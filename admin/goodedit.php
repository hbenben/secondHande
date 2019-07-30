<?php
include_once("top.php");
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$sql1=mysql_query("select * from shangpin where id=".$id."",$conn);
$info1=mysql_fetch_array($sql1);
?>
<div id="middle">
<?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>更改商品</strong></div>
      <table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#BCE8B5" class="table table-bordered">
	<script language="javascript">
	function chkinput()
	{
	  if(document.form1.mingcheng.value==""){
		alert("请输入商品名称");
		document.form1.mingcheng.focus();
		return false;}
		if(document.form1.huiyuanjia.value==""){
		alert("请输入商品会员价");
		document.form1.huiyuanjia.focus();
		return false;}
		if(document.form1.shichangjia.value==""){
		alert("请输入商品市场价");
		document.form1.shichangjia.focus();
		return false;}
		if(document.form1.xinghao.value==""){
		alert("请输入商品号");
		document.form1.xinghao.focus();
		return false;}
		
	  if(document.form1.shuliang.value==""){
		alert("请输入商品数量");
		document.form1.shuliang.focus();
		return false;}
	   if(document.form1.jianjie.value==""){
		alert("请输入商品简介");
		document.form1.jianjie.focus();
		return false;}
		
	}
    </script>
     <form name="form1" enctype="multipart/form-data" method="post" action="?action=update&id=<?php echo $info1['id'];?>" onSubmit="return chkinput();">
     <tr bgcolor="#FFFFFF">
              <td height="25" colspan="2" align="center" bgcolor="#ffffff"><strong>
                
              更改商品</strong></td>
          </tr>
	  <tr>
        <td width="129" height="35" align="right">名称：</td>
        <td width="618"><input type="text" name="mingcheng" size="25" class="span1-1" style="width:50%;" value="<?php echo $info1['mingcheng'];?>"></td>
      </tr>
      <tr>
        <td height="35" align="right">价格：</td>
        <td height="25">市场价：<input type="text" name="shichangjia" size="10" class="span1-1"  value="<?php echo $info1['shichangjia'];?>">
          元&nbsp;&nbsp;会员价：
          <input type="text" name="huiyuanjia" size="10" class="span1-1" value="<?php echo $info1['huiyuanjia'];?>">
          元</td>
      </tr>
      <tr>
        <td height="35" align="right">类型：</td>
        <td height="25">
           <?php
			$sql=mysql_query("select * from fenlei order by id desc",$conn);
			$info=mysql_fetch_array($sql);
			if($info==false)
			{
			  echo "请先添加商品类型!";
			}
			else
			{
			?>
                <select name="typeid" class="span1-1">
                  <?php
			do
			{
			?>
                  <option value=<?php echo $info['id'];?> <?php if($info1['typeid']==$info['id']) {echo "selected";}?>><?php echo $info['fenleiname'];?></option>
                  <?php
			}
			while($info=mysql_fetch_array($sql));
			?>
                </select>
                <?php
		     }
		    ?>
        </td>
      </tr>
      <tr>
        <td height="35" align="right">商品号：</td>
        <td height="25"><input type="text" name="xinghao" class="span1-1" size="20" value="<?php echo $info1['xinghao'];?>"></td>
      </tr>
      <tr>
        <td height="35" align="right">是否推荐：</td>
        <td height="25">
          <select name="tuijian" class="span1-1" >
                  <option value=1 <?php if($info1['tuijian']==1) {echo "selected";}?>>是</option>
                  <option value=0 <?php if($info1['tuijian']==0) {echo "selected";}?>>否</option>
                </select>
     
      </td>
      </tr>
      <tr>
        <td height="35" align="right">数量：</td>
        <td height="25"><input type="text" name="shuliang" class="span1-1" size="20" value="<?php echo $info1['shuliang'];?>"></td>
      </tr>
      <tr>
        <td height="35" align="right">图片：</td>
        <td height="25">
		<input type="file" name="img" class="span1-1" size="30">
        <input type="hidden" name="upfile1" class="span1-1" size="30" value="<?php echo $info1['tupian'];?>">
        <?php if( $info1['tupian']){?><img src="<?php echo __BASE__;?>/upimages/<?php echo $info1["tupian"];?>"  height="100" width="100"/><?php }?></td>
      </tr>
      <tr>
        <td height="80" align="right">简介：</td>
        <td><div style="margin:10px;"><script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
$(function(){
	$("#submitBtn").click(function(){
		$("#content").val(UE.getEditor('editor').getContent());
		$("#form1").submit();
	});

	var ue = UE.getEditor('editor');
});
</script>
			  <script id="editor" type="text/plain" style="width:100%;height:200px;"><?php echo $info1['jianjie'];?></script>
				<textarea name="content" id="content" style="display:none;"><?php echo $info1['jianjie'];?></textarea></div>
        </td>
      </tr>
      <tr>
        <td height="25" colspan="2"><input type="submit" id="submitBtn" value="确定" class="btn btn-info " style="width:80px;">
        </td>
      </tr>
	  </form>
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
		if(is_numeric($_POST['shichangjia'])==false || is_numeric($_POST['huiyuanjia'])==false)
	 {
	   echo "<script>alert('价格只能为数字！');history.back();</script>";
	   exit;
	 }
	if(is_numeric($_POST['shuliang'])==false)
	 {
	   echo "<script>alert('数量只能为数字！');history.back();</script>";
	   exit;
	 }
	$mingcheng=$_POST['mingcheng'];
	$shichangjia=$_POST['shichangjia'];
	$huiyuanjia=$_POST['huiyuanjia'];
	$typeid=$_POST['typeid'];
	$xinghao=$_POST['xinghao'];
	$tuijian=$_POST['tuijian'];
	$shuliang=$_POST['shuliang'];
	if(!empty($_FILES['img']['name'])){
			$file = $_FILES['img'];//得到传输的数据
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
			  $fileName =$mu.".".$type;
			 
			}else{
			  //echo "Failed!";
			}
		}
		else
		{
			$fileName=$_POST['upfile1'];
			}
	$jianjie=$_POST['content'];
	$addtime=date("Y-m-j");
	mysql_query("update shangpin set mingcheng='$mingcheng',jianjie='$jianjie',xinghao='$xinghao',tupian='$fileName',typeid='$typeid',shichangjia='$shichangjia',huiyuanjia='$huiyuanjia',tuijian='$tuijian',shuliang='$shuliang' where id=".$id."",$conn);
echo "<script>alert('商品".$mingcheng."修改成功!');history.back();;</script>";
}
include_once("foot.php");
?>
</body>
</html>