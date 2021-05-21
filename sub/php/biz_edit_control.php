<?php
	include "00_conn.php";
	
	#변수받은것 저장
	$no = $_GET['no'];
	$title = $_POST['title'];
	$name = $_POST['name'];
	$pass = $_POST['pass'];
	$content = $_POST['content'];

	#echo "정보확인<br/> 제목 : ".$title." / 이름 : ".$name." / 입력비번 : ".$pass." / 내용 : ".$content."<br/>no : ".$no;

	$sqlP = "SELECT pass FROM freeboard WHERE no='$no'";
	$resultP = MYSQLI_QUERY($conn, $sqlP);
	$rowP = MYSQLI_FETCH_ARRAY($resultP);
	#echo "<br/>오리지날 비번 : ".$rowP[0];
	
	if($rowP[0]==$pass){
		$sql = "UPDATE freeboard
				SET name='$name', title='$title', content='$content' WHERE no='$no'";

		MYSQLI_QUERY($conn, $sql);

		#echo "<script>alert('수정되었습니다.');</script>";
	}
	else{echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 확인해주세요.'); history.go(-1);</script>";}

	MYSQLI_CLOSE($conn);

	echo "<meta http-equiv='Refresh' content='1; ../biz.php'/>";
?>