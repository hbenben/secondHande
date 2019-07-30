<?php
	session_start();
	$sessionname = !empty($_SESSION['sessionname']) ? $_SESSION['sessionname'] : '';
	$sessionid = !empty($_SESSION['sessionid']) ? $_SESSION['sessionid'] : '';
	if(empty($sessionname) || empty($sessionid)){
		echo "<script>top.location='index.php'</script>";
		exit();
	}
?>