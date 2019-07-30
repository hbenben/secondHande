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
   <div class="title_right"><strong>系统首页</strong></div>  
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10"></td>
        <td valign="top">管理员您好！ 欢迎登录<?php echo $title;?>后台管理系统
          
          </td>
        <td width="10"></td>
      </tr>
    </table>
     </div>     
     </div>
    </div>
    
<!-- 底部 -->
<?php
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