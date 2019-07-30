<?php
	session_start();
	include_once("top.php");
	include_once("conn/page.php");
?>
<script type="text/javascript"> 
function check(){
    if(document.form1.content_desc.value==""){
		alert("请输入内容");
		document.form1.content_desc.focus();
		return false;}
}
</script>

<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="index.php"> 首页</a></li>
				<li><a href="userbook.php">客户留言</a></li>
			</ul>
			<div class="list-group">
			<?php
			$countSql="select id from leaveword where isno=1";//sql语句
			$pageSize="5"; //每页显示数
			$curPage= !empty($_GET['curPage']) ? intval($_GET['curPage']) :0;//通过GET传来的当前页数
			$urlPara= "";//这是URL后面跟的参数，也就是问号传值
		    $pageid="";
			$pageOutStr=reterPageStrSam($pageSize,$curPage,$countSql,$urlPara,$pageid);
			$pageOutStrArr=explode("||",$pageOutStr);
			$rsStart=$pageOutStrArr[0];//limit 后的第一个参数
			$pageStr=$pageOutStrArr[2];//limit 后的第二个参数
			$pageCount=$pageOutStrArr[1];//总页数
			$sql = mysql_query("select * from leaveword where isno=1 order by id desc limit $rsStart, $pageSize",$conn);
			while($row=mysql_fetch_array($sql))
			{
			?>
				<div class="list-group-item">
					<h4>留言人：<font color="#FF0000"><?php 
			  $spid=$row['userid'];
			  $sql1 =  mysql_query("select * from usermember where id='$spid'",$conn);
				$row1=mysql_fetch_object($sql1);
                 echo  $row1->name;
              ?></font> 提交时间：<span class="badge"> <?=$row['add_time']?></span></a> </h4>
				</div>
                <div class="alert alert-info">
				<?=$row['content']?>
                 <?php if(!empty($row['recontent'])){?>
                <div class="list-group-item">
					<h4><font color="#FF0000">管理员回复</font> 回复时间：<span class="badge"> <?=$row['add_time']?></span></a> </h4>
				</div>
                <div class="alert alert-success"><?php echo $row['recontent'];?></div><?php }?>
				</div>
               <input type="hidden" value="<?=$urlPara?>" name="url"><input type="hidden" value="<?=$curPage?>" name="curPage">
			<?php
            }
			?>
			</div>
			<div class="pages">
				<ul class="pagination">
					 <?=$pageStr?>
				</ul>
			</div>
            
                <div class="height2"></div>
                <form class="form-horizontal" method="post" role="form" name="form1" action="?act=add" onSubmit="return check();">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">发表留言</label>
                        <div class="col-sm-10">
                          <textarea name="content_desc" rows="4" class="form-control" placeholder="请输入留言内容"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">提交</button>
                        </div>
                    </div>
                </form>
            
		</div>
<?php
include_once("left.php");
?>
	</div>
</div>
<?php
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	if($act == 'add')
	{
		$content_desc = !empty($_POST['content_desc']) ? $_POST['content_desc'] : '';
		$add_time = date("Y-m-d H:i:s",time());
		$username = !empty($_SESSION['username']) ? $_SESSION['username'] : '';
		if($username==""){echo "<script>alert('请登录后操作!');top.location='login.php'</script>";}
		$sql3=mysql_query("select * from usermember where name='".$_SESSION['username']."'",$conn);
		$info3=mysql_fetch_array($sql3);
		$userid=$info3['id'];
		mysql_query("insert into leaveword(userid,isno,content,add_time) VALUES('$userid','0','$content_desc','$add_time')",$conn);
		echo "<script>alert('发表成功,请等待管理员回复!');location.href='userbook.php';</script>";
	}
?>
<?php
	include_once("foot.php");
?>