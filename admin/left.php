<div class="left">
     
     <script type="text/javascript">
var myMenu;
window.onload = function() {
	myMenu = new SDMenu("my_menu");
	myMenu.init();
};
</script>

<div id="my_menu" class="sdmenu">
	<div >
		<span>管理设置</span>
		<a href="changeadmin.php">密码及支付二维码</a>
	</div>
	<div class="collapsed">
		<span>商品管理</span>
		<a href="addgoods.php">添加商品</a>
        <a href="goods.php">商品管理</a>
        <a href="fenleiadd.php">添加商品分类</a>
        <a href="fenlei.php">商品类别管理</a>
	</div>
	<div class="collapsed">
		<span>用户管理</span>
		 <a href="usermember.php">会员管理</a>
	</div>
	<div class="collapsed">
		<span>订单管理</span>
		 <a href="dingdan.php">订单管理</a>
	</div>    
 	<div class="collapsed">
		<span>公告管理</span>
		<a href="newsadd.php">添加公告</a>
		<a href="news.php">公告列表</a>

	</div>
    <div class="collapsed">
		<span>留言管理</span>
		 <a href="leaveword.php">留言管理</a>
	</div>
 	<div class="collapsed">
		<span>商品评论管理</span>
		<a href="pinglun.php">评论管理</a>
	</div>
</div>

     </div>
     <div class="Switch"></div>
     <script type="text/javascript">
	$(document).ready(function(e) {
    $(".Switch").click(function(){
	$(".left").toggle();
	 
		});
});
</script>