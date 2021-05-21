<?php
	header("content-type:text/html; charset=utf-8");

	$conn = MYSQLI_CONNECT("localhost","escape1001","rdrdani11355!","escape1001");

	if($conn->connect_error){
		echo $conn->connect_errorno;
		exit;
	}

	$conn->set_charset("utf8");
?>