<?php
	include "00_conn.php";
	
	#변수받은것 저장
	$title = $_POST['title'];
	$name = $_POST['name'];
	$pass = $_POST['pass'];
	$content = $_POST['content'];

	#echo "정보확인<br/> 제목 : ".$title." / 이름 : ".$name." / 비번 : ".$pass." / 내용 : ".$content;

	if(!empty($title) && !empty($name) && !empty($pass) && !empty($content)){
		$sql = "INSERT INTO freeboard
			(name, pass, title, content, wdate)
			values
			('$name','$pass','$title','$content', now())";
	
		MYSQLI_QUERY($conn, $sql);

		#echo "글쓰기에 성공했습니다.";
	}
	else{
		echo "<script>alert('필수입력정보입니다. 기입해주세요'); history.go(-1);</script>";	
	}	

	MYSQLI_CLOSE($conn);

	echo "<meta http-equiv='Refresh' content='1; ../biz.php'/>";
?>