<?php
	header("content-type:text/html; charset=utf-8");

	$conn = MYSQLI_CONNECT("localhost","root","","inboard");

	if($conn->connect_error){
		echo $conn->connect_errorno;
		exit;
	}

	$conn->set_charset("utf8");
?>