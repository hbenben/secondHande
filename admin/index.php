<?php
include_once("../conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <title><?php echo $title;?>后台管理系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style/skin.css" />
</head>
<script language="javascript">
	  function chkinput(form){
	    if(form.name.value==""){
		  alert("请输入用户名!");
		  form.name.select();
		  return(false);
		}
		if(form.pwd.value==""){
		  alert("请输入用户密码!");
		  form.pwd.select();
		  return(false);
		}
		return(true);
	  }
	</script>
    <body>
        <table width="100%">
            <!-- 顶部部分 -->
            <tr height="41"><td colspan="2" background="images/login_top_bg.gif">&nbsp;</td></tr>
            <!-- 主体部分 -->
            <tr style="background:url(images/login_bg.jpg) repeat-x;" height="532">
                <!-- 主体左部分 -->
                <td id="left_cont">
                    <table width="100%" height="100%">
                        <tr height="155"><td colspan="2">&nbsp;</td></tr>
                        <tr>
                            <td width="20%" rowspan="2">&nbsp;</td>
                            <td width="60%">
                                <table width="100%">
                                    <tr height="70"><td align="right"><img src="images/logo1.png"/></td></tr>
                                    <tr height="274">
                                        <td valign="top" align="right">
                                            <ul>
                                                <li>1- 商城网店建立的首选方案...</li>
                                                <li>2- 一站通式的整合方式，方便用户使用...</li>
                                                <li>3- 强大的后台，管理内容易如反掌...</li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table></td>
                            <td width="15%" rowspan="2">&nbsp;</td>
                        </tr>
                        <tr><td colspan="2">&nbsp;</td></tr>
                    </table>
                </td>
                <!-- 主体右部分 -->
                <td id="right_cont">
                    <table height="100%">
                        <tr height="30%"><td colspan="3">&nbsp;</td></tr>
                        <tr>
                            <td width="30%" rowspan="5">&nbsp;</td>
                            <td valign="top" id="form">
                                <form name="form1" method="post" action="chkadmin.php" onSubmit="return chkinput(this)">
                                    <table valign="top" width="100%">
                                        <tr><td colspan="2"><h4 style="letter-spacing:1px;font-size:16px;">网站管理后台</h4></td></tr>
                                        <tr><td>管理员：</td><td><input type="text" name="name" value="" id="name" /></td></tr>
                                        <tr><td>密&nbsp;&nbsp;&nbsp;&nbsp;码：</td><td><input type="password" name="pwd" value="" id="pwd" /></td></tr>
                                        <tr class="bt" align="center"><td>&nbsp;<input type="submit" value="登陆" /></td><td align="left">&nbsp;<input type="reset" value="重填" /><script language="javascript">
      function change()
      {
          var img =document.getElementById("yzm_num");
          img.src=img.src+'?';
      }
</script></td></tr>
                                    </table>
                                </form>
                            </td>
                            <td rowspan="5">&nbsp;</td>
                        </tr>
                        <tr><td colspan="3">&nbsp;</td></tr>
                    </table>
                </td>
            </tr>
            <!-- 底部部分 -->
            <tr id="login_bot"><td colspan="2"><p>Copyright &copy; 2018-2019</p></td></tr>
        </table>
    </body>
</html>